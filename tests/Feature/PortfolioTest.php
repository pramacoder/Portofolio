<?php

namespace Tests\Feature;

use App\Data\PortfolioData;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_all_primary_pages_render_successfully_without_placeholders(): void
    {
        $routes = ['/', '/about', '/projects', '/experience', '/education', '/skills', '/blog', '/contact', '/links'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $response->assertSee('Pramajaya');
            $response->assertDontSee('Sarah Mitchell');
            $response->assertDontSee('Company Name 1');
            $response->assertDontSee('your.email@example.com');
            $response->assertDontSee('hello@portfoliodesign.com');
        }
    }

    public function test_all_project_detail_pages_and_assets_exist(): void
    {
        $projects = PortfolioData::projects('id');
        $this->assertGreaterThanOrEqual(15, count($projects));

        foreach ($projects as $project) {
            $response = $this->get(route('projects.show', $project['slug']));
            $response->assertStatus(200);
            $response->assertSee($project['title']);
            $response->assertSee('https://github.com/pramacoder/');
            $this->assertFileExists(public_path($project['image']));
        }

        $this->get('/projects/non-existent-project')->assertStatus(404);
    }

    public function test_all_blog_detail_pages_and_assets_exist(): void
    {
        $posts = PortfolioData::blogPosts('id');
        $this->assertGreaterThanOrEqual(4, count($posts));

        foreach ($posts as $post) {
            $response = $this->get(route('blog.show', $post['slug']));
            $response->assertStatus(200);
            $response->assertSee($post['title']);
            $this->assertFileExists(public_path($post['image']));
        }

        $this->get('/blog/non-existent-article')->assertStatus(404);
    }

    public function test_bilingual_locale_switching_translates_real_content(): void
    {
        $this->get('/')->assertSee('Proyek Unggulan');

        $this->get('/locale/en')->assertRedirect();
        $this->get('/')->assertSee('Featured Projects')->assertSee('Download CV');

        $this->get('/locale/id')->assertRedirect();
        $this->get('/')->assertSee('Proyek Unggulan')->assertSee('Unduh CV');
    }

    public function test_contact_form_validation_and_submission(): void
    {
        $this->post('/contact', [])->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Kolaborasi Proyek Web',
            'message' => 'Halo Pramajaya, tertarik berdiskusi mengenai proyek web dan AI.',
        ])->assertRedirect(route('contact'))->assertSessionHas('contact_success');
    }

    public function test_sitemap_and_owner_documents_exist(): void
    {
        $this->get('/sitemap.xml')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/xml')
            ->assertSee('<urlset', false)
            ->assertSee('/projects/sagara-villas');

        $this->assertFileExists(public_path('documents/cv-pramajaya.pdf'));
        $this->assertFileExists(public_path('images/brand/logo-pramajaya.png'));
        $this->assertFileExists(public_path('images/portfolio/hero/Homepage.jpeg'));
    }
}
