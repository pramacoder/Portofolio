<?php

namespace App\Http\Controllers;

use App\Data\PortfolioData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    private function resolveLocale(Request $request): string
    {
        $locale = $request->session()->get('locale', 'id');
        if (!in_array($locale, ['id', 'en'], true)) {
            $locale = 'id';
        }
        app()->setLocale($locale);
        return $locale;
    }

    private function shared(string $locale): array
    {
        return [
            'locale' => $locale,
            'profile' => PortfolioData::profile($locale),
            'ui' => PortfolioData::ui($locale),
        ];
    }

    public function switchLocale(Request $request, string $lang): RedirectResponse
    {
        if (in_array($lang, ['id', 'en'], true)) {
            $request->session()->put('locale', $lang);
        }
        return redirect()->back()->withInput();
    }

    public function home(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        $projects = PortfolioData::projects($locale);
        $featuredProjects = array_values(array_filter($projects, fn ($p) => $p['featured']));

        return view('pages.home', array_merge($this->shared($locale), [
            'technologies' => PortfolioData::technologies(),
            'highlights' => PortfolioData::highlights($locale),
            'coreSkills' => PortfolioData::coreSkills($locale),
            'featuredProjects' => $featuredProjects,
            'latestPosts' => PortfolioData::blogPosts($locale),
        ]));
    }

    public function about(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        return view('pages.about', array_merge($this->shared($locale), [
            'coreSkills' => PortfolioData::coreSkills($locale),
            'education' => PortfolioData::education($locale),
        ]));
    }

    public function projects(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        $projects = PortfolioData::projects($locale);
        $tags = ['Full-Stack', 'AI / ML', 'Laravel', 'Next.js', 'React', 'TypeScript', 'Python', 'NLP', 'Web Design', 'Data & IoT'];

        return view('pages.projects', array_merge($this->shared($locale), [
            'projects' => $projects,
            'filterTags' => $tags,
            'initialTag' => $request->query('tag', ''),
        ]));
    }

    public function projectDetail(Request $request, string $slug): View
    {
        $locale = $this->resolveLocale($request);
        $projects = PortfolioData::projects($locale);
        $project = collect($projects)->firstWhere('slug', $slug);
        abort_if(!$project, 404);

        $related = collect($projects)
            ->where('slug', '!=', $slug)
            ->where('category', $project['category'])
            ->take(3)
            ->values()
            ->all();

        return view('pages.project-detail', array_merge($this->shared($locale), [
            'project' => $project,
            'relatedProjects' => $related,
        ]));
    }

    public function experience(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        return view('pages.experience', array_merge($this->shared($locale), [
            'experiences' => PortfolioData::experience($locale),
        ]));
    }

    public function education(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        return view('pages.education', array_merge($this->shared($locale), [
            'education' => PortfolioData::education($locale),
        ]));
    }

    public function skills(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        return view('pages.skills', array_merge($this->shared($locale), [
            'skillsData' => PortfolioData::skills($locale),
        ]));
    }

    public function blog(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        $posts = PortfolioData::blogPosts($locale);
        $categories = array_values(array_unique(array_column($posts, 'category')));

        return view('pages.blog', array_merge($this->shared($locale), [
            'posts' => $posts,
            'categories' => $categories,
        ]));
    }

    public function blogDetail(Request $request, string $slug): View
    {
        $locale = $this->resolveLocale($request);
        $posts = PortfolioData::blogPosts($locale);
        $post = collect($posts)->firstWhere('slug', $slug);
        abort_if(!$post, 404);

        $relatedProject = null;
        if (!empty($post['related_project'])) {
            $relatedProject = collect(PortfolioData::projects($locale))
                ->firstWhere('slug', $post['related_project']);
        }

        return view('pages.blog-detail', array_merge($this->shared($locale), [
            'post' => $post,
            'relatedProject' => $relatedProject,
        ]));
    }

    public function contact(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        return view('pages.contact', $this->shared($locale));
    }

    public function submitContact(Request $request): RedirectResponse
    {
        $locale = $this->resolveLocale($request);

        // Simple honeypot check
        if ($request->filled('website')) {
            return redirect()->route('contact');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'min:3', 'max:160'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        $msg = $locale === 'id'
            ? 'Terima kasih, ' . e($validated['name']) . '! Pesan Anda telah tercatat. Anda juga dapat menghubungi langsung melalui email atau GitHub.'
            : 'Thank you, ' . e($validated['name']) . '! Your message has been recorded. You can also reach out directly via email or GitHub.';

        return redirect()->route('contact')->with('contact_success', $msg);
    }

    public function links(Request $request): View
    {
        $locale = $this->resolveLocale($request);
        $links = PortfolioData::links($locale);
        $categories = array_values(array_unique(array_column($links, 'category')));

        return view('pages.links', array_merge($this->shared($locale), [
            'links' => $links,
            'categories' => $categories,
        ]));
    }

    public function sitemap(): Response
    {
        $staticUrls = [
            route('home'),
            route('about'),
            route('projects'),
            route('experience'),
            route('education'),
            route('skills'),
            route('blog'),
            route('contact'),
            route('links'),
        ];

        $projectUrls = array_map(
            fn ($p) => route('projects.show', $p['slug']),
            PortfolioData::projects('id')
        );

        $blogUrls = array_map(
            fn ($b) => route('blog.show', $b['slug']),
            PortfolioData::blogPosts('id')
        );

        $urls = array_merge($staticUrls, $projectUrls, $blogUrls);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $url) {
            $xml .= '  <url><loc>' . htmlspecialchars($url, ENT_XML1) . '</loc><lastmod>' . now()->toDateString() . '</lastmod></url>' . "\n";
        }
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
