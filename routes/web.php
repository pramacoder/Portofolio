<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{lang}', [PortfolioController::class, 'switchLocale'])->name('locale.switch');

Route::get('/', [PortfolioController::class, 'home'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [PortfolioController::class, 'projectDetail'])->name('projects.show');
Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience');
Route::get('/education', [PortfolioController::class, 'education'])->name('education');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/blog', [PortfolioController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PortfolioController::class, 'blogDetail'])->name('blog.show');
Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');
Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact.submit');
Route::get('/links', [PortfolioController::class, 'links'])->name('links');
Route::get('/sitemap.xml', [PortfolioController::class, 'sitemap'])->name('sitemap');
