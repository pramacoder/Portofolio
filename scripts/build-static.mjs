import fs from 'fs';
import path from 'path';
import { execSync } from 'child_process';
import { icon } from './icons.mjs';

const ROOT = process.cwd();
const DIST = path.join(ROOT, 'dist');
const SITE_URL = (process.env.APP_URL || 'https://pramajaya.com').replace(/\/$/, '');

const rawData = JSON.parse(fs.readFileSync(path.join(ROOT, 'scripts/portfolio-data.json'), 'utf8'));
const technologies = rawData.technologies;

const esc = (s) =>
    String(s ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');

const escAttrJs = (val) => esc(JSON.stringify(val));

function routeUrl(locale, routePath) {
    const clean = routePath === '/' ? '/' : `/${routePath.replace(/^\/+|\/+$/g, '')}/`;
    if (locale === 'en') {
        return clean === '/' ? '/en/' : `/en${clean}`;
    }
    return clean;
}

function assetUrl(p) {
    if (!p) return '/';
    if (p.startsWith('http://') || p.startsWith('https://')) return p;
    return '/' + p.replace(/^\/+/, '');
}

function localizeHref(locale, href) {
    if (!href) return routeUrl(locale, '/');
    if (href.startsWith('http://') || href.startsWith('https://') || href.startsWith('mailto:')) return href;
    const [p, q] = href.split('?');
    const base = routeUrl(locale, p || '/');
    return q ? `${base}?${q}` : base;
}

function sectionCard({ title = null, subtitle = null, cls = '', extraAttrs = '', body = '' }) {
    const header = title
        ? `<div class="flex flex-col items-center justify-center text-center mb-5">
            <h2 class="text-lg sm:text-xl font-semibold tracking-tight text-foreground">${esc(title)}</h2>
            ${subtitle ? `<p class="text-sm text-muted-foreground mt-1 max-w-2xl">${esc(subtitle)}</p>` : ''}
           </div>`
        : '';
    return `<section ${extraAttrs} class="section-reveal rounded-xl border border-border bg-card p-4 sm:p-6 w-full max-w-full overflow-hidden ${cls}">
        ${header}
        <div class="space-y-4">${body}</div>
    </section>`;
}

function projectCard(locale, project, compact = false) {
    const detailHref = routeUrl(locale, `/projects/${project.slug}`);
    const tags = project.tags.slice(0, compact ? 3 : 4);
    return `<article class="group flex h-full flex-col overflow-hidden rounded-lg border border-border bg-card shadow-xs transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
        <a href="${detailHref}" class="block overflow-hidden border-b border-border bg-muted/40">
            <div class="relative aspect-[16/9] w-full overflow-hidden">
                <img src="${assetUrl(project.image)}" alt="${esc(project.title)}" loading="lazy" class="h-full w-full object-cover object-top transition-transform duration-300 group-hover:scale-[1.02]">
                ${project.demo ? `<span class="absolute top-2.5 right-2.5 inline-flex items-center gap-1 rounded-full bg-card/90 backdrop-blur-xs border border-border px-2.5 py-0.5 text-[11px] font-semibold text-primary shadow-xs"><span class="h-1.5 w-1.5 rounded-full bg-primary"></span>Live</span>` : ''}
            </div>
        </a>
        <div class="flex flex-1 flex-col justify-between p-4">
            <div>
                <div class="flex items-center justify-between gap-2 mb-1.5">
                    <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 text-[11px] font-medium text-primary">${esc(project.category)}</span>
                    <span class="font-mono text-[11px] text-muted-foreground">${esc(project.year)}</span>
                </div>
                <a href="${detailHref}" class="inline-flex items-start justify-between gap-1.5 group/link w-full">
                    <h3 class="font-semibold text-base sm:text-lg text-foreground group-hover:text-primary transition-colors leading-snug">${esc(project.title)}</h3>
                    ${icon('arrow-up-right', 'w-4 h-4 mt-1 shrink-0 text-muted-foreground group-hover:text-primary transition-colors')}
                </a>
                <p class="text-sm text-muted-foreground mt-1.5 line-clamp-2 leading-relaxed">${esc(project.summary)}</p>
            </div>
            <div class="mt-4 pt-3 border-t border-border/70 space-y-3">
                <div class="flex flex-wrap gap-1.5">
                    ${tags.map((t) => `<span class="inline-flex items-center rounded-full bg-muted px-2.5 py-0.5 text-xs font-normal text-muted-foreground">${esc(t)}</span>`).join('')}
                </div>
                ${
                    compact
                        ? ''
                        : `<div class="flex items-center justify-between gap-3 pt-1 text-xs font-medium">
                            <a href="${esc(project.github)}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-muted-foreground hover:text-foreground transition-colors">${icon('github', 'w-3.5 h-3.5')}<span>GitHub</span></a>
                            ${
                                project.demo
                                    ? `<a href="${esc(project.demo)}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-primary hover:underline"><span>Live Demo</span>${icon('external-link', 'w-3.5 h-3.5')}</a>`
                                    : `<a href="${detailHref}" class="inline-flex items-center gap-1 text-primary hover:underline"><span>Detail</span>${icon('arrow-right', 'w-3.5 h-3.5')}</a>`
                            }
                          </div>`
                }
            </div>
        </div>
    </article>`;
}

function blogCard(locale, post, readMoreLabel) {
    const href = routeUrl(locale, `/blog/${post.slug}`);
    return `<article class="group flex h-full flex-col overflow-hidden rounded-lg border border-border bg-card shadow-xs transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
        <a href="${href}" class="block overflow-hidden border-b border-border bg-muted/40">
            <div class="relative aspect-[16/9] w-full overflow-hidden">
                <img src="${assetUrl(post.image)}" alt="${esc(post.title)}" loading="lazy" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]">
            </div>
        </a>
        <div class="flex flex-1 flex-col justify-between p-4 sm:p-5">
            <div>
                <div class="flex flex-wrap items-center gap-2 text-xs text-muted-foreground mb-2">
                    <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 font-medium text-primary">${esc(post.category)}</span>
                    <span class="inline-flex items-center gap-1 font-mono">${icon('calendar', 'w-3.5 h-3.5')}${esc(post.date)}</span>
                    <span>•</span>
                    <span>${esc(post.read_time)}</span>
                </div>
                <a href="${href}">
                    <h3 class="font-semibold text-base sm:text-lg text-foreground group-hover:text-primary transition-colors line-clamp-2 leading-snug">${esc(post.title)}</h3>
                </a>
                <p class="text-sm text-muted-foreground mt-2 line-clamp-2 leading-relaxed">${esc(post.excerpt)}</p>
            </div>
            <div class="mt-4 pt-3 border-t border-border/70">
                <a href="${href}" class="inline-flex items-center gap-1.5 text-sm font-medium text-primary hover:underline">
                    <span>${esc(readMoreLabel)}</span>${icon('arrow-right', 'w-4 h-4')}
                </a>
            </div>
        </div>
    </article>`;
}

function layout({ locale, data, title, description, activeNav, currentRoutePath, content }) {
    const { profile, ui } = data;
    const idSwitchUrl = routeUrl('id', currentRoutePath);
    const enSwitchUrl = routeUrl('en', currentRoutePath);

    const navGroups = [
        {
            label: ui.nav_groups.main,
            items: [
                { key: 'home', path: '/', label: ui.nav.home, ic: 'home' },
                { key: 'about', path: '/about', label: ui.nav.about, ic: 'user' },
                { key: 'contact', path: '/contact', label: ui.nav.contact, ic: 'mail' },
            ],
        },
        {
            label: ui.nav_groups.portfolio,
            items: [
                { key: 'projects', path: '/projects', label: ui.nav.projects, ic: 'folder' },
                { key: 'blog', path: '/blog', label: ui.nav.blog, ic: 'book' },
            ],
        },
        {
            label: ui.nav_groups.professional,
            items: [
                { key: 'experience', path: '/experience', label: ui.nav.experience, ic: 'briefcase' },
                { key: 'education', path: '/education', label: ui.nav.education, ic: 'graduation' },
                { key: 'skills', path: '/skills', label: ui.nav.skills, ic: 'wrench' },
                { key: 'links', path: '/links', label: ui.nav.links, ic: 'link' },
            ],
        },
    ];

    const renderNavItems = (mobile = false) =>
        navGroups
            .map(
                (group) => `
            <div class="${mobile ? '' : 'flex flex-col'}">
                <div ${mobile ? 'class="px-2 pb-1 text-xs font-medium text-muted-foreground"' : 'x-show="!$store.ui.sidebarCollapsed" class="flex h-7 items-center px-2 text-xs font-medium text-muted-foreground/80"'}>
                    ${esc(group.label)}
                </div>
                <ul class="${mobile ? 'space-y-1' : 'flex flex-col gap-1'}">
                    ${group.items
                        .map((item) => {
                            const active = activeNav === item.key;
                            const href = routeUrl(locale, item.path);
                            if (mobile) {
                                return `<li><a href="${href}" @click="$store.ui.closeMobileMenu()" class="flex items-center gap-2.5 rounded-md px-2.5 py-2 text-sm transition-colors ${active ? 'bg-accent font-medium text-accent-foreground' : 'text-foreground/85 hover:bg-accent/70'}">${icon(item.ic, 'w-4 h-4 shrink-0')}<span>${esc(item.label)}</span></a></li>`;
                            }
                            return `<li><a href="${href}" title="${esc(item.label)}" ${active ? 'aria-current="page"' : ''} class="flex items-center gap-2.5 rounded-md px-2.5 h-8.5 text-sm transition-colors ${active ? 'bg-accent font-medium text-accent-foreground' : 'text-foreground/80 hover:bg-accent/70 hover:text-accent-foreground'}" :class="$store.ui.sidebarCollapsed ? 'justify-center px-0' : ''">${icon(item.ic, 'w-4 h-4 shrink-0')}<span x-show="!$store.ui.sidebarCollapsed" class="truncate">${esc(item.label)}</span></a></li>`;
                        })
                        .join('')}
                </ul>
            </div>`
            )
            .join('');

    const canonicalUrl = SITE_URL + routeUrl(locale, currentRoutePath);

    return `<!DOCTYPE html>
<html lang="${locale}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>${esc(title)}</title>
    <meta name="description" content="${esc(description || profile.intro)}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="${esc(title)}">
    <meta property="og:description" content="${esc(description || profile.intro)}">
    <meta property="og:image" content="${SITE_URL}${assetUrl(profile.avatar)}">
    <meta property="og:url" content="${esc(canonicalUrl)}">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="${assetUrl(profile.logo)}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&family=Geist+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <script>
        (function () {
            const saved = localStorage.getItem('theme');
            if (saved === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    <link rel="stylesheet" href="/assets/app.css">
    <script type="module" src="/assets/app.js"></script>
</head>
<body x-data class="antialiased min-h-svh bg-background text-foreground selection:bg-primary/20 selection:text-foreground">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:rounded-md focus:bg-primary focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-primary-foreground">
        ${locale === 'id' ? 'Lewati ke konten utama' : 'Skip to main content'}
    </a>

    <div class="flex flex-col md:flex-row min-h-screen w-full max-w-full overflow-x-hidden">
        <header class="sticky top-0 z-40 flex h-14 w-full shrink-0 items-center justify-between border-b border-border bg-background/90 px-4 backdrop-blur-md md:hidden">
            <div class="flex items-center gap-2.5 min-w-0">
                <button type="button" @click="$store.ui.openMobileMenu()" aria-label="Open navigation menu" class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent transition-colors">
                    ${icon('menu', 'w-4 h-4')}
                </button>
                <a href="${routeUrl(locale, '/')}" class="flex items-center gap-2 min-w-0">
                    <img src="${assetUrl(profile.logo)}" alt="${esc(profile.name)}" class="h-6 w-6 rounded-full bg-white p-0.5 object-contain shrink-0 border border-border">
                    <span class="font-bold text-sm tracking-tight text-foreground truncate">${esc(profile.name)}</span>
                </a>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <div class="inline-flex items-center gap-0.5 rounded-md border border-border bg-card p-0.5" role="group" aria-label="Language switcher">
                    <a href="${idSwitchUrl}" class="rounded px-2 py-1 text-xs font-medium transition-colors ${locale === 'id' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted'}">ID</a>
                    <a href="${enSwitchUrl}" class="rounded px-2 py-1 text-xs font-medium transition-colors ${locale === 'en' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted'}">EN</a>
                </div>
                <button type="button" @click="$store.ui.toggleTheme()" aria-label="Toggle color theme" class="inline-flex h-9 w-9 items-center justify-center rounded-md text-muted-foreground hover:bg-accent hover:text-foreground transition-colors">
                    <span x-show="!$store.ui.dark">${icon('moon', 'w-4 h-4')}</span>
                    <span x-show="$store.ui.dark" x-cloak>${icon('sun', 'w-4 h-4')}</span>
                </button>
            </div>
        </header>

        <div class="hidden md:block shrink-0 w-64 transition-[width] duration-200 ease-linear" :class="$store.ui.sidebarCollapsed ? '!w-[68px]' : 'w-64'">
            <aside aria-label="Sidebar Navigation" class="fixed inset-y-0 left-0 z-30 flex h-svh w-64 flex-col border-r border-border bg-sidebar text-foreground transition-[width] duration-200 ease-linear" :class="$store.ui.sidebarCollapsed ? '!w-[68px]' : 'w-64'">
                <div class="relative flex flex-col gap-2 border-b border-border p-3 pb-4">
                    <button type="button" @click="$store.ui.toggleSidebar()" :title="$store.ui.sidebarCollapsed ? '${esc(ui.actions.expand_sidebar)}' : '${esc(ui.actions.collapse_sidebar)}'" :aria-label="$store.ui.sidebarCollapsed ? '${esc(ui.actions.expand_sidebar)}' : '${esc(ui.actions.collapse_sidebar)}'" class="absolute right-2.5 top-2.5 inline-flex h-7 w-7 items-center justify-center rounded-md text-muted-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                        ${icon('panel-left', 'w-4 h-4')}
                    </button>
                    <a href="${routeUrl(locale, '/')}" class="flex flex-col items-center space-y-2.5 pt-3 focus-visible:rounded-lg" :class="$store.ui.sidebarCollapsed ? 'pt-7 space-y-0' : ''">
                        <div class="relative shrink-0">
                            <div class="h-20 w-20 overflow-hidden rounded-full border-2 border-primary/20 bg-muted transition-all duration-200" :class="$store.ui.sidebarCollapsed ? '!h-9 !w-9' : 'h-20 w-20'">
                                <img src="${assetUrl(profile.avatar)}" alt="${esc(profile.name)}" class="h-full w-full object-cover object-top">
                            </div>
                            <img x-show="!$store.ui.sidebarCollapsed" src="${assetUrl(profile.logo)}" alt="${esc(profile.name)} Logo" class="absolute -bottom-1 -right-1 h-7 w-7 rounded-full border-2 border-sidebar bg-white p-0.5 object-contain shadow-xs">
                        </div>
                        <div x-show="!$store.ui.sidebarCollapsed" x-transition.opacity class="text-center px-1">
                            <p class="text-lg font-bold tracking-tight text-foreground leading-tight">${esc(profile.name)}</p>
                            <p class="text-xs text-muted-foreground mt-1 leading-snug">${esc(profile.role_short)}</p>
                            <p class="text-xs text-muted-foreground leading-snug">${esc(profile.role_secondary)}</p>
                        </div>
                    </a>
                </div>

                <nav class="flex-1 overflow-y-auto p-2 space-y-2" aria-label="Main Navigation">
                    ${renderNavItems(false)}
                </nav>

                <div class="border-t border-border p-3 space-y-3">
                    <div x-show="!$store.ui.sidebarCollapsed" class="space-y-3">
                        <div class="flex justify-center">
                            <div class="inline-flex items-center gap-1 rounded-md border border-border bg-card p-1" role="group" aria-label="Language switcher">
                                <a href="${idSwitchUrl}" class="rounded px-2.5 py-1 text-xs font-medium transition-colors ${locale === 'id' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted hover:text-foreground'}">ID</a>
                                <a href="${enSwitchUrl}" class="rounded px-2.5 py-1 text-xs font-medium transition-colors ${locale === 'en' ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted hover:text-foreground'}">EN</a>
                            </div>
                        </div>
                        <div class="flex justify-center gap-2">
                            <a href="${esc(profile.github)}" target="_blank" rel="noopener noreferrer" aria-label="GitHub" class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">${icon('github', 'w-4 h-4')}</a>
                            <a href="mailto:${esc(profile.email)}" aria-label="Email" class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">${icon('mail', 'w-4 h-4')}</a>
                            <a href="${routeUrl(locale, '/links')}" aria-label="Links" class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">${icon('link', 'w-4 h-4')}</a>
                        </div>
                        <a href="${assetUrl(profile.cv_url)}" download="CV-Pramajaya.pdf" class="inline-flex h-9.5 w-full items-center justify-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                            ${icon('download', 'w-4 h-4')}<span>${esc(ui.actions.download_cv)}</span>
                        </a>
                        <button type="button" @click="$store.ui.toggleTheme()" class="inline-flex h-9 w-full items-center justify-center gap-2 rounded-md border border-border bg-card px-3 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                            <span x-show="!$store.ui.dark" class="inline-flex items-center gap-2">${icon('moon', 'w-4 h-4')}<span>${esc(ui.actions.dark_mode)}</span></span>
                            <span x-show="$store.ui.dark" x-cloak class="inline-flex items-center gap-2">${icon('sun', 'w-4 h-4')}<span>${esc(ui.actions.light_mode)}</span></span>
                        </button>
                    </div>
                    <div x-show="$store.ui.sidebarCollapsed" x-cloak class="flex flex-col items-center gap-2">
                        <a href="${assetUrl(profile.cv_url)}" download="CV-Pramajaya.pdf" title="${esc(ui.actions.download_cv)}" aria-label="${esc(ui.actions.download_cv)}" class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-primary text-primary-foreground hover:bg-primary-hover transition-colors">${icon('download', 'w-4 h-4')}</a>
                        <button type="button" @click="$store.ui.toggleTheme()" aria-label="Toggle theme" class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-border bg-card text-foreground hover:bg-accent transition-colors">
                            <span x-show="!$store.ui.dark">${icon('moon', 'w-4 h-4')}</span>
                            <span x-show="$store.ui.dark" x-cloak>${icon('sun', 'w-4 h-4')}</span>
                        </button>
                    </div>
                </div>
            </aside>
        </div>

        <div x-show="$store.ui.mobileMenuOpen" x-cloak @keydown.escape.window="$store.ui.closeMobileMenu()" class="fixed inset-0 z-50 md:hidden" role="dialog" aria-modal="true" aria-label="Mobile Navigation">
            <div x-show="$store.ui.mobileMenuOpen" x-transition.opacity @click="$store.ui.closeMobileMenu()" class="fixed inset-0 bg-black/50 backdrop-blur-xs"></div>
            <aside x-show="$store.ui.mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 z-50 flex w-72 max-w-[85vw] flex-col border-r border-border bg-sidebar text-foreground shadow-xl">
                <div class="relative flex flex-col items-center gap-2 border-b border-border p-4 pt-6">
                    <button type="button" @click="$store.ui.closeMobileMenu()" aria-label="Close navigation" class="absolute right-3 top-3 inline-flex h-8 w-8 items-center justify-center rounded-md border border-border bg-card text-muted-foreground hover:text-foreground">${icon('x', 'w-4 h-4')}</button>
                    <div class="relative">
                        <div class="h-16 w-16 overflow-hidden rounded-full border-2 border-primary/20 bg-muted">
                            <img src="${assetUrl(profile.avatar)}" alt="${esc(profile.name)}" class="h-full w-full object-cover object-top">
                        </div>
                        <img src="${assetUrl(profile.logo)}" alt="${esc(profile.name)} Logo" class="absolute -bottom-1 -right-1 h-6 w-6 rounded-full border-2 border-sidebar bg-white p-0.5 object-contain">
                    </div>
                    <div class="text-center">
                        <p class="text-base font-bold">${esc(profile.name)}</p>
                        <p class="text-xs text-muted-foreground">${esc(profile.role_short)}</p>
                    </div>
                </div>
                <nav class="flex-1 overflow-y-auto p-3 space-y-3">${renderNavItems(true)}</nav>
                <div class="border-t border-border p-3 space-y-2.5">
                    <a href="${assetUrl(profile.cv_url)}" download="CV-Pramajaya.pdf" class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">${icon('download', 'w-4 h-4')}<span>${esc(ui.actions.download_cv)}</span></a>
                    <div class="flex items-center justify-center gap-2">
                        <a href="${esc(profile.github)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-md border border-border bg-card text-xs font-medium hover:bg-accent">${icon('github', 'w-4 h-4')}<span>GitHub</span></a>
                        <a href="mailto:${esc(profile.email)}" class="inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-md border border-border bg-card text-xs font-medium hover:bg-accent">${icon('mail', 'w-4 h-4')}<span>Email</span></a>
                    </div>
                </div>
            </aside>
        </div>

        <main id="main-content" class="flex-1 min-w-0 max-w-full w-full overflow-x-hidden">
            <div class="container mx-auto max-w-5xl py-8 px-4 md:px-8">
                ${content}
                <footer class="mt-12 border-t border-border pt-6 pb-8 text-xs sm:text-sm text-muted-foreground">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-2.5">
                            <img src="${assetUrl(profile.logo)}" alt="${esc(profile.name)} Logo" class="h-6 w-6 rounded-full bg-white p-0.5 border border-border object-contain">
                            <span>© ${new Date().getFullYear()} ${esc(profile.name)}. ${locale === 'id' ? 'Portofolio Pribadi · Informatika Universitas Udayana.' : 'Personal Portfolio · Informatics Universitas Udayana.'}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="${esc(profile.github)}" target="_blank" rel="noopener noreferrer" class="hover:text-foreground transition-colors">GitHub</a>
                            <a href="${routeUrl(locale, '/projects')}" class="hover:text-foreground transition-colors">${locale === 'id' ? 'Proyek' : 'Projects'}</a>
                            <a href="${routeUrl(locale, '/contact')}" class="hover:text-foreground transition-colors">${locale === 'id' ? 'Kontak' : 'Contact'}</a>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </div>
</body>
</html>`;
}

function renderHome(locale, data) {
    const { profile, ui, highlights, coreSkills, projects, blogPosts } = data;
    const featured = projects.filter((p) => p.featured);

    const hero = `<section class="py-8 sm:py-12 md:py-16">
        <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-10">
            <div class="flex-1 min-w-0 space-y-6 w-full">
                <div class="space-y-3">
                    <div class="inline-flex items-center gap-2 rounded-full border border-border bg-card px-3 py-1 text-xs font-medium text-muted-foreground">
                        <span class="h-2 w-2 rounded-full bg-primary"></span>
                        <span>${esc(profile.university)} · ${esc(profile.location)}</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-foreground">${esc(profile.name)}</h1>
                    <p class="text-lg sm:text-xl text-muted-foreground leading-relaxed">${esc(profile.headline_role)}</p>
                </div>
                <div class="flex flex-col sm:flex-row sm:flex-wrap gap-3 w-full sm:w-auto">
                    <a href="${routeUrl(locale, '/contact')}" class="inline-flex h-11 items-center justify-center gap-2 whitespace-nowrap rounded-md bg-primary px-6 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors w-full sm:w-auto">
                        <span>${esc(ui.actions.contact_me)}</span>${icon('arrow-right', 'w-4 h-4')}
                    </a>
                    <div class="grid grid-cols-2 gap-3 w-full sm:flex sm:w-auto">
                        <a href="${routeUrl(locale, '/projects')}" class="inline-flex h-11 items-center justify-center gap-2 whitespace-nowrap rounded-md border border-border bg-card px-4 sm:px-5 text-xs sm:text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                            <span class="truncate">${esc(ui.actions.view_portfolio)}</span>${icon('folder', 'w-4 h-4 shrink-0')}
                        </a>
                        <a href="${routeUrl(locale, '/skills')}" class="inline-flex h-11 items-center justify-center gap-2 whitespace-nowrap rounded-md border border-border bg-card px-4 sm:px-5 text-xs sm:text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                            <span class="truncate">${esc(ui.actions.view_skills)}</span>${icon('wrench', 'w-4 h-4 shrink-0')}
                        </a>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="grid grid-cols-2 sm:grid-cols-4 rounded-xl border border-border bg-card/70 overflow-hidden">
                        ${profile.stats
                            .map((stat, idx) => {
                                const href = stat.external ? stat.href : localizeHref(locale, stat.href);
                                return `<a href="${esc(href)}" ${stat.external ? 'target="_blank" rel="noopener noreferrer"' : ''} class="group px-3 py-3 flex flex-col items-center text-center justify-center transition-colors hover:bg-accent/50 ${idx % 2 === 0 ? 'border-r border-border/70' : ''} ${idx < 2 ? 'border-b sm:border-b-0 border-border/70' : ''} ${idx < 3 ? 'sm:border-r sm:border-border/70' : ''}">
                                    <div class="h-7 w-7 bg-primary/10 rounded-full flex items-center justify-center text-primary mb-1.5 shrink-0 group-hover:scale-105 transition-transform">${icon(stat.icon, 'w-3.5 h-3.5')}</div>
                                    <div class="text-base sm:text-lg font-extrabold text-foreground group-hover:text-primary transition-colors tracking-tight font-mono">${esc(stat.value)}</div>
                                    <div class="text-[11px] sm:text-xs text-muted-foreground font-medium leading-snug mt-0.5">${esc(stat.label)}</div>
                                </a>`;
                            })
                            .join('')}
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 flex justify-center">
                <div class="relative w-52 h-52 sm:w-60 sm:h-60 lg:w-64 lg:h-64 xl:w-72 xl:h-72 rounded-full overflow-hidden border-4 border-primary/15 bg-muted shadow-sm shrink-0">
                    <img src="${assetUrl(profile.avatar)}" alt="${esc(profile.name)}" class="h-full w-full object-cover object-top">
                </div>
            </div>
        </div>
    </section>`;

    const introCard = sectionCard({
        body: `<p class="text-base sm:text-lg text-muted-foreground leading-relaxed">${esc(profile.intro)}</p>`,
    });

    const techCard = sectionCard({
        title: ui.sections.tech_stack,
        cls: 'mt-12',
        extraAttrs: 'x-data="{ expanded: false }"',
        body: `<div class="relative">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4 overflow-hidden transition-all duration-300" :class="expanded ? 'max-h-[1200px]' : 'max-h-[210px] sm:max-h-[215px]'">
                ${technologies
                    .map(
                        (tech) => `<div class="flex flex-col items-center justify-center p-4 bg-muted/70 hover:bg-accent/70 border border-border/60 rounded-lg h-24 transition-colors text-center">
                            <span class="font-mono text-xs font-semibold text-primary bg-primary/10 px-2 py-0.5 rounded mb-1.5">${esc(tech.short)}</span>
                            <span class="text-sm font-semibold text-foreground leading-tight">${esc(tech.name)}</span>
                            <span class="text-[11px] text-muted-foreground mt-0.5">${esc(tech.category)}</span>
                        </div>`
                    )
                    .join('')}
            </div>
        </div>
        <div class="flex justify-center pt-2">
            <button type="button" @click="expanded = !expanded" class="inline-flex items-center gap-1.5 rounded-md border border-border bg-background px-4 py-2 text-xs sm:text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span x-text="expanded ? '${esc(ui.actions.show_less)}' : '${esc(ui.actions.show_more)}'">${esc(ui.actions.show_more)}</span>
            </button>
        </div>`,
    });

    const highlightsCard = sectionCard({
        title: ui.sections.highlights,
        cls: 'mt-12',
        body: `<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            ${highlights
                .map(
                    (item) => `<a href="${esc(localizeHref(locale, item.href))}" class="group rounded-lg border border-border bg-card shadow-xs overflow-hidden h-full flex flex-col justify-between transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
                        <div>
                            <div class="relative h-44 w-full overflow-hidden border-b border-border bg-muted/40">
                                <img src="${assetUrl(item.image)}" alt="${esc(item.title)}" loading="lazy" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.03]">
                            </div>
                            <div class="p-4 sm:p-5">
                                <div class="flex flex-wrap items-center gap-2 mb-2.5">
                                    <span class="inline-flex items-center rounded-full border border-primary/25 bg-primary/10 text-primary text-xs font-semibold px-2.5 py-0.5">${esc(item.badge_primary)}</span>
                                    <span class="inline-flex items-center rounded-full border border-border bg-muted/70 text-muted-foreground text-xs font-medium px-2.5 py-0.5">${esc(item.badge_secondary)}</span>
                                </div>
                                <h3 class="font-semibold text-base sm:text-lg text-foreground group-hover:text-primary transition-colors line-clamp-2 leading-snug">${esc(item.title)}</h3>
                                <p class="text-sm text-muted-foreground mt-2 line-clamp-3 leading-relaxed">${esc(item.description)}</p>
                            </div>
                        </div>
                    </a>`
                )
                .join('')}
        </div>`,
    });

    const skillsCard = sectionCard({
        title: ui.sections.core_skills,
        cls: 'mt-12',
        body: `<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            ${coreSkills
                .map(
                    (skill) => `<div class="rounded-lg border border-border bg-background/50 p-5 sm:p-6 transition-colors hover:border-primary/40">
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/10 text-primary p-2.5 rounded-md shrink-0">${icon(skill.icon, 'w-5 h-5')}</div>
                            <div>
                                <h3 class="font-semibold text-base text-foreground">${esc(skill.title)}</h3>
                                <p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">${esc(skill.description)}</p>
                            </div>
                        </div>
                    </div>`
                )
                .join('')}
        </div>
        <div class="flex justify-center pt-2">
            <a href="${routeUrl(locale, '/skills')}" class="inline-flex items-center gap-2 rounded-md border border-border bg-background px-5 py-2 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span>${esc(ui.actions.view_skills)}</span>${icon('arrow-right', 'w-4 h-4')}
            </a>
        </div>`,
    });

    const projectsCard = sectionCard({
        title: ui.sections.featured_projects,
        cls: 'mt-12',
        body: `<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-5">
            ${featured.map((p) => projectCard(locale, p, true)).join('')}
        </div>
        <div class="flex justify-center pt-3">
            <a href="${routeUrl(locale, '/projects')}" class="inline-flex items-center gap-2 rounded-md border border-border bg-background px-5 py-2.5 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span>${esc(ui.actions.view_all_projects)}</span>${icon('arrow-right', 'w-4 h-4')}
            </a>
        </div>`,
    });

    const blogSection = sectionCard({
        title: ui.sections.latest_blog,
        cls: 'mt-12',
        body: `<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            ${blogPosts.map((p) => blogCard(locale, p, ui.actions.read_more)).join('')}
        </div>
        <div class="flex justify-center pt-3">
            <a href="${routeUrl(locale, '/blog')}" class="inline-flex items-center gap-2 rounded-md border border-border bg-background px-5 py-2.5 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors">
                <span>${esc(ui.actions.view_all_articles)}</span>${icon('arrow-right', 'w-4 h-4')}
            </a>
        </div>`,
    });

    const contactCta = sectionCard({
        title: ui.sections.contact_cta_title,
        cls: 'mt-12',
        body: `<div class="text-center py-2">
            <p class="text-base sm:text-lg text-muted-foreground mb-6 max-w-2xl mx-auto leading-relaxed">${esc(ui.sections.contact_cta_desc)}</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="${routeUrl(locale, '/contact')}" class="inline-flex h-11 items-center justify-center gap-2 rounded-md bg-primary px-8 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors w-full sm:w-auto">
                    <span>${esc(ui.actions.contact_me)}</span>${icon('arrow-right', 'w-4 h-4')}
                </a>
                <a href="${esc(profile.github)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-11 items-center justify-center gap-2 rounded-md border border-border bg-background px-6 text-sm font-medium text-foreground hover:bg-accent hover:text-accent-foreground transition-colors w-full sm:w-auto">
                    ${icon('github', 'w-4 h-4')}<span>GitHub @pramacoder</span>
                </a>
            </div>
        </div>`,
    });

    return hero + introCard + techCard + highlightsCard + skillsCard + projectsCard + blogSection + contactCta;
}

function renderAbout(locale, data) {
    const { profile, ui, coreSkills } = data;
    const isId = locale === 'id';
    const values = isId
        ? [
              { title: 'Kode Teruji & Terstruktur', desc: 'Mengutamakan arsitektur yang jelas, tipe data yang rapi, serta automated testing agar sistem andal saat berkembang.' },
              { title: 'Berbasis Data & Bukti', desc: 'Dalam eksperimen ML dan NLP, setiap keputusan arsitektur didasarkan pada baseline pembanding dan metrik evaluasi yang jujur.' },
              { title: 'Fokus Pengalaman Pengguna', desc: 'Model AI atau backend sekuat apa pun perlu disajikan melalui antarmuka yang bersih, responsif, dan mudah dipahami.' },
              { title: 'Belajar Berkelanjutan', desc: 'Aktif membangun proyek nyata di GitHub untuk terus mengasah keahlian lintas web, data science, dan sistem terdistribusi.' },
          ]
        : [
              { title: 'Clean, Tested Engineering', desc: 'Prioritizing maintainable architecture, strict typing, and automated tests so systems remain dependable as they grow.' },
              { title: 'Evidence-Driven Modeling', desc: 'In ML and NLP work, grounding every modeling choice in fair baselines, clean preprocessing, and honest evaluation metrics.' },
              { title: 'User-First Interfaces', desc: 'Pairing backend and AI capabilities with calm, accessible, responsive web interfaces that real people enjoy using.' },
              { title: 'Build in the Open', desc: 'Learning through shipping real repositories on GitHub across full-stack web, NLP, information retrieval, and IoT.' },
          ];

    return `<div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">${isId ? 'Tentang Saya' : 'About Me'}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${esc(profile.headline_role)}</p>
        </div>

        <div class="relative overflow-hidden rounded-2xl border border-border bg-gradient-to-br from-primary/10 via-card to-muted/60 p-6 md:p-8 shadow-xs">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="space-y-3 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/12 text-primary text-xs font-semibold">${icon('graduation', 'w-3.5 h-3.5')}<span>${esc(profile.university)} · Informatika</span></div>
                    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-foreground">
                        ${isId ? 'Menggabungkan <span class="text-primary">Rekayasa Web Modern</span> dan <span class="text-primary">Eksplorasi AI / Sains Data</span>' : 'Bridging <span class="text-primary">Modern Web Engineering</span> and <span class="text-primary">AI / Data Science</span>'}
                    </h2>
                    <p class="text-muted-foreground text-sm md:text-base leading-relaxed">${esc(profile.intro)}</p>
                    <div class="flex flex-wrap items-center gap-3 pt-1 text-xs font-medium text-muted-foreground">
                        <span class="inline-flex items-center gap-1">${icon('map-pin', 'w-3.5 h-3.5 text-primary')} ${esc(profile.location)}</span>
                        <span>•</span>
                        <span class="inline-flex items-center gap-1">${icon('github', 'w-3.5 h-3.5 text-primary')} github.com/pramacoder</span>
                    </div>
                </div>
                <div class="w-full md:w-auto flex flex-col sm:flex-row md:flex-col gap-3 shrink-0">
                    <a href="${routeUrl(locale, '/projects')}" class="inline-flex h-11 items-center justify-center gap-2 rounded-md bg-primary px-6 text-sm font-semibold text-primary-foreground hover:bg-primary-hover transition-colors">${icon('folder', 'w-4 h-4')}<span>${esc(ui.actions.view_portfolio)}</span></a>
                    <a href="${routeUrl(locale, '/contact')}" class="inline-flex h-11 items-center justify-center gap-2 rounded-md border border-border bg-card px-6 text-sm font-medium text-foreground hover:bg-accent transition-colors"><span>${esc(ui.actions.contact_me)}</span>${icon('arrow-right', 'w-4 h-4')}</a>
                </div>
            </div>
        </div>

        ${sectionCard({
            title: isId ? 'Perjalanan & Latar Belakang' : 'Background & Journey',
            body: `<div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                <div class="flex flex-col items-center gap-3">
                    <div class="w-44 h-44 sm:w-52 sm:h-52 rounded-2xl overflow-hidden border border-border bg-muted shadow-xs">
                        <img src="${assetUrl(profile.avatar)}" alt="${esc(profile.name)}" class="h-full w-full object-cover object-top">
                    </div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-border bg-muted/60 px-3 py-1 text-xs font-mono text-muted-foreground">
                        <img src="${assetUrl(profile.logo)}" alt="Logo" class="h-4 w-4 rounded-full bg-white object-contain">
                        <span>${esc(profile.handle)}</span>
                    </div>
                </div>
                <div class="md:col-span-2 space-y-4 text-sm sm:text-base text-muted-foreground leading-relaxed">
                    ${
                        isId
                            ? `<p>Halo, saya <strong class="text-foreground font-semibold">Pramajaya</strong>, mahasiswa S1 Informatika di <strong class="text-foreground font-semibold">Universitas Udayana</strong> yang memiliki minat kuat pada pengembangan web full-stack serta penerapan Data Science, Machine Learning, dan Natural Language Processing (NLP).</p>
                               <p>Melalui 38 repositori publik di GitHub (<a href="${esc(profile.github)}" target="_blank" rel="noopener noreferrer" class="text-primary underline-offset-4 hover:underline">github.com/pramacoder</a>), saya konsisten mengubah konsep teoritis menjadi perangkat lunak nyata — mulai dari platform B2B Dwipa Store, sistem reservasi villa &amp; apartemen, sistem informasi proposal PKM kampus berbasis Laravel, hingga mesin pencari dokumen akademik TF-IDF/BM25 dan klasifikasi IndoBERT.</p>
                               <p>Tujuan saya ke depan adalah terus mendalami rekayasa sistem berbasis data (Data Science &amp; AI Engineering) sembari mempertahankan kualitas arsitektur frontend/backend yang rapi, teruji, dan mudah digunakan oleh pengguna akhir.</p>`
                            : `<p>Hi, I'm <strong class="text-foreground font-semibold">Pramajaya</strong>, an Informatics undergraduate at <strong class="text-foreground font-semibold">Universitas Udayana</strong> passionate about full-stack web engineering as well as practical Data Science, Machine Learning, and Natural Language Processing (NLP).</p>
                               <p>Across 38 public GitHub repositories (<a href="${esc(profile.github)}" target="_blank" rel="noopener noreferrer" class="text-primary underline-offset-4 hover:underline">github.com/pramacoder</a>), I turn coursework and real-world ideas into working software — spanning Dwipa Store B2B food supply, luxury villa booking systems, a Laravel university PKM proposal platform, an Okapi BM25 / TF-IDF academic search engine, and IndoBERT news classification benchmarks.</p>
                               <p>My goal is to grow as a Data Scientist and Software Engineer who bridges strong analytical modeling with clean, well-tested, user-focused web products.</p>`
                    }
                </div>
            </div>`,
        })}

        ${sectionCard({
            title: isId ? 'Bidang Fokus Utama' : 'Primary Focus Areas',
            body: `<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                ${coreSkills
                    .map(
                        (a) => `<div class="rounded-lg border border-border bg-background/50 p-5">
                            <div class="flex items-start gap-3.5">
                                <div class="p-2 rounded-md bg-primary/10 text-primary shrink-0">${icon(a.icon, 'w-5 h-5')}</div>
                                <div><h3 class="font-semibold text-base text-foreground">${esc(a.title)}</h3><p class="text-sm text-muted-foreground mt-1 leading-relaxed">${esc(a.description)}</p></div>
                            </div>
                        </div>`
                    )
                    .join('')}
            </div>`,
        })}

        ${sectionCard({
            title: isId ? 'Prinsip Kerja' : 'Engineering Principles',
            body: `<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                ${values.map((v) => `<div class="rounded-lg border border-border bg-background/40 p-5"><h3 class="font-semibold text-foreground">${esc(v.title)}</h3><p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">${esc(v.desc)}</p></div>`).join('')}
            </div>`,
        })}
    </div>`;
}

function renderProjects(locale, data) {
    const { profile, ui, projects } = data;
    const isId = locale === 'id';
    const filterTags = ['Full-Stack', 'AI / ML', 'Laravel', 'Next.js', 'React', 'TypeScript', 'Python', 'NLP', 'Web Design', 'Data & IoT'];
    const featured = projects.filter((p) => p.featured);
    const others = projects.filter((p) => !p.featured);

    return `<div x-data="{
            search: '',
            selectedTag: new URLSearchParams(window.location.search).get('tag') || '',
            matches(title, summary, category, tags) {
                const q = this.search.trim().toLowerCase();
                const tagMatch = !this.selectedTag || category === this.selectedTag || tags.includes(this.selectedTag);
                if (!tagMatch) return false;
                if (!q) return true;
                return title.toLowerCase().includes(q) || summary.toLowerCase().includes(q) || category.toLowerCase().includes(q) || tags.join(' ').toLowerCase().includes(q);
            }
        }" class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">${esc(ui.nav.projects)}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                ${isId ? 'Koleksi proyek nyata dari GitHub @pramacoder mencakup pengembangan web full-stack, website live hosted, AI/NLP, Information Retrieval, BI, dan IoT.' : 'Curated real projects from GitHub @pramacoder spanning full-stack web engineering, live hosted sites, AI/NLP, Information Retrieval, BI, and IoT.'}
            </p>
        </div>

        <div class="space-y-4 bg-card border border-border rounded-xl p-4 shadow-xs">
            <div class="relative">
                ${icon('search', 'w-4 h-4 text-muted-foreground absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none')}
                <input type="search" x-model="search" aria-label="${isId ? 'Cari proyek' : 'Search projects'}" placeholder="${isId ? 'Cari proyek (judul, deskripsi, teknologi)...' : 'Search projects (title, description, tech stack)...'}" class="flex h-10 w-full rounded-md border border-border bg-background pl-9 pr-4 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-colors">
            </div>
            <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-border/70 text-xs">
                <span class="text-muted-foreground font-medium inline-flex items-center gap-1 mr-1">${icon('filter', 'w-3.5 h-3.5')}<span>Filter Tag:</span></span>
                <button type="button" @click="selectedTag = ''" :class="selectedTag === '' ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground hover:text-foreground'" class="px-3 py-1 rounded-full text-xs font-medium transition-colors">${esc(ui.actions.all)}</button>
                ${filterTags
                    .map(
                        (tag) => `<button type="button" @click="selectedTag = selectedTag === '${tag}' ? '' : '${tag}'" :class="selectedTag === '${tag}' ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground hover:text-foreground'" class="px-3 py-1 rounded-full text-xs font-medium transition-colors">${esc(tag)}</button>`
                    )
                    .join('')}
            </div>
        </div>

        ${sectionCard({
            title: ui.sections.featured_projects,
            subtitle: isId ? 'Proyek utama yang merepresentasikan keahlian saya di Full-Stack Web, AI/NLP, dan Information Retrieval.' : 'Flagship repositories demonstrating full-stack architecture, NLP, and Information Retrieval.',
            body: `<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                ${featured.map((p) => `<div x-show="matches(${escAttrJs(p.title)}, ${escAttrJs(p.summary)}, ${escAttrJs(p.category)}, ${escAttrJs(p.tags)})">${projectCard(locale, p, false)}</div>`).join('')}
            </div>`,
        })}

        ${sectionCard({
            title: isId ? 'Proyek & Eksperimen Lainnya' : 'More Projects & Experiments',
            subtitle: isId ? 'Website undangan digital live, Deep Learning, Chatbot Gemini, Business Intelligence, Laravel, dan IoT.' : 'Live digital invitations, Deep Learning, Gemini AI, Business Intelligence, Laravel, and IoT.',
            body: `<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                ${others.map((p) => `<div x-show="matches(${escAttrJs(p.title)}, ${escAttrJs(p.summary)}, ${escAttrJs(p.category)}, ${escAttrJs(p.tags)})">${projectCard(locale, p, false)}</div>`).join('')}
            </div>`,
        })}

        <div class="rounded-xl border border-border bg-card p-5 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-center sm:text-left">
                <h2 class="font-semibold text-base text-foreground">${isId ? 'Ingin melihat seluruh 38 repositori publik?' : 'Want to explore all 38 public repositories?'}</h2>
                <p class="text-sm text-muted-foreground mt-0.5">${isId ? 'Kunjungi profil GitHub saya untuk kode sumber, notebook eksperimen, dan commit terbaru.' : 'Visit my GitHub profile for full source code, experiment notebooks, and latest commits.'}</p>
            </div>
            <a href="${esc(profile.github)}?tab=repositories" target="_blank" rel="noopener noreferrer" class="inline-flex h-10 shrink-0 items-center justify-center gap-2 rounded-md bg-primary px-5 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">
                ${icon('github', 'w-4 h-4')}<span>github.com/pramacoder</span>
            </a>
        </div>
    </div>`;
}

function renderProjectDetail(locale, data, project) {
    const { ui, projects } = data;
    const isId = locale === 'id';
    const related = projects.filter((p) => p.slug !== project.slug && p.category === project.category).slice(0, 3);

    return `<div class="space-y-8">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <a href="${routeUrl(locale, '/projects')}" class="inline-flex h-9 items-center gap-2 rounded-md border border-border bg-card px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                ${icon('arrow-left', 'w-4 h-4')}<span>${esc(ui.actions.back_to_projects)}</span>
            </a>
            <div class="flex flex-wrap items-center gap-2">
                <a href="${esc(project.github)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 items-center gap-2 rounded-md border border-border bg-card px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                    ${icon('github', 'w-4 h-4')}<span>${esc(ui.actions.view_github)}</span>
                </a>
                ${project.demo ? `<a href="${esc(project.demo)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 items-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors"><span>${esc(ui.actions.live_demo)}</span>${icon('external-link', 'w-4 h-4')}</a>` : ''}
            </div>
        </div>

        <div class="space-y-4">
            <div class="flex flex-wrap gap-2">
                <span class="inline-flex items-center rounded-full bg-primary px-3 py-0.5 text-xs font-semibold text-primary-foreground">${esc(project.category)}</span>
                <span class="inline-flex items-center rounded-full border border-border bg-card px-3 py-0.5 text-xs font-medium text-foreground">${esc(project.status)}</span>
                <span class="inline-flex items-center rounded-full border border-border bg-card px-3 py-0.5 text-xs font-mono text-muted-foreground">${esc(project.year)}</span>
            </div>
            <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-foreground">${esc(project.title)}</h1>
                <p class="text-lg sm:text-xl text-muted-foreground mt-2">${esc(project.subtitle)}</p>
            </div>
            <div class="flex flex-wrap items-center gap-4 text-sm text-muted-foreground">
                <span class="inline-flex items-center gap-1.5">${icon('user', 'w-4 h-4 text-primary')}${esc(project.role)}</span>
                <span class="inline-flex items-center gap-1.5 font-mono text-xs">${icon('github', 'w-4 h-4 text-primary')}pramacoder/${esc(project.repo)}</span>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-border bg-card shadow-xs">
            <img src="${assetUrl(project.image)}" alt="${esc(project.title)}" class="w-full aspect-[16/9] object-cover object-top">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                ${sectionCard({ body: `<h2 class="text-xl font-bold text-foreground">${isId ? 'Gambaran Umum' : 'Overview'}</h2><p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${esc(project.summary)}</p>` })}
                ${sectionCard({ body: `<h2 class="text-xl font-bold text-foreground">${isId ? 'Permasalahan' : 'Problem Statement'}</h2><p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${esc(project.problem)}</p>` })}
                ${sectionCard({ body: `<h2 class="text-xl font-bold text-foreground">${isId ? 'Solusi & Implementasi' : 'Solution & Architecture'}</h2><p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${esc(project.solution)}</p>` })}
                ${sectionCard({
                    body: `<h2 class="text-xl font-bold text-foreground">${isId ? 'Hasil & Verifikasi' : 'Outcomes & Verification'}</h2>
                    <ul class="space-y-2.5 text-sm sm:text-base text-muted-foreground">
                        ${project.results.map((r) => `<li class="flex items-start gap-2.5"><span class="mt-1 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary/12 text-primary">${icon('check', 'w-3.5 h-3.5')}</span><span>${esc(r)}</span></li>`).join('')}
                    </ul>`,
                })}
            </div>
            <div class="space-y-6">
                ${sectionCard({
                    body: `<h2 class="text-base font-bold text-foreground">${isId ? 'Teknologi' : 'Tech Stack'}</h2>
                    <div class="flex flex-wrap gap-2">${project.tags.map((t) => `<span class="inline-flex items-center rounded-full border border-border bg-muted px-3 py-1 text-xs font-medium text-foreground">${esc(t)}</span>`).join('')}</div>`,
                })}
                ${sectionCard({
                    body: `<h2 class="text-base font-bold text-foreground">${isId ? 'Fitur Utama' : 'Key Features'}</h2>
                    <ul class="space-y-2 text-sm text-muted-foreground">${project.features.map((f) => `<li class="flex items-start gap-2"><span class="h-1.5 w-1.5 rounded-full bg-primary mt-2 shrink-0"></span><span>${esc(f)}</span></li>`).join('')}</ul>`,
                })}
                ${sectionCard({
                    body: `<h2 class="text-base font-bold text-foreground">${isId ? 'Tautan Proyek' : 'Project Links'}</h2>
                    <div class="space-y-2.5">
                        <a href="${esc(project.github)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md border border-border bg-background px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">${icon('github', 'w-4 h-4')}<span>${esc(ui.actions.view_github)}</span></a>
                        ${project.demo ? `<a href="${esc(project.demo)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors"><span>${esc(ui.actions.live_demo)}</span>${icon('external-link', 'w-4 h-4')}</a>` : ''}
                    </div>`,
                })}
            </div>
        </div>

        ${related.length ? sectionCard({ title: isId ? 'Proyek Terkait' : 'Related Projects', body: `<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">${related.map((r) => projectCard(locale, r, true)).join('')}</div>` }) : ''}
    </div>`;
}

function renderExperience(locale, data) {
    const isId = locale === 'id';
    return `<div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">${isId ? 'Pengalaman & Proyek Terverifikasi' : 'Experience & Engineering Track'}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${isId ? 'Rekam jejak pengembangan perangkat lunak, proyek kampus, dan riset AI/NLP yang terdokumentasi di GitHub.' : 'Verified software engineering, university system development, and AI/NLP research documented on GitHub.'}</p>
        </div>
        ${sectionCard({
            body: `<div class="space-y-8">
                ${data.experience
                    .map(
                        (exp, idx) => `<div class="relative pl-6 border-l-2 border-border ${idx < data.experience.length - 1 ? 'pb-8' : ''}">
                            <div class="absolute -left-[7px] top-1.5 h-3 w-3 rounded-full bg-primary ring-4 ring-card"></div>
                            <h2 class="font-semibold text-lg sm:text-xl text-foreground leading-snug">${esc(exp.role)}</h2>
                            <p class="text-sm text-muted-foreground mt-1"><span class="font-medium text-foreground/85">${esc(exp.org)}</span> • ${esc(exp.period)} • ${esc(exp.location)}</p>
                            <ul class="mt-4 space-y-2 list-disc list-inside text-sm sm:text-base text-muted-foreground leading-relaxed">
                                ${exp.bullets.map((b) => `<li>${esc(b)}</li>`).join('')}
                            </ul>
                            <div class="flex flex-wrap gap-2 mt-4">
                                ${exp.tags.map((t) => `<span class="inline-flex items-center rounded-full border border-border bg-muted/60 px-2.5 py-0.5 text-xs font-medium text-foreground">${esc(t)}</span>`).join('')}
                            </div>
                        </div>`
                    )
                    .join('')}
            </div>`,
        })}
    </div>`;
}

function renderEducation(locale, data) {
    const isId = locale === 'id';
    return `<div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">${esc(data.ui.nav.education)}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${isId ? 'Latar belakang akademik dan pembelajaran berkelanjutan di bidang Informatika, Web, dan AI.' : 'Academic background and continuous self-directed learning in Informatics, Web, and AI.'}</p>
        </div>
        ${sectionCard({
            title: isId ? 'Pendidikan Formal' : 'Formal Education',
            body: `<div class="space-y-6">
                ${data.education.formal
                    .map(
                        (item) => `<div class="relative pl-6 border-l-2 border-border">
                            <div class="absolute -left-[7px] top-1.5 h-3 w-3 rounded-full bg-primary ring-4 ring-card"></div>
                            <h3 class="font-semibold text-lg sm:text-xl text-foreground">${esc(item.degree)}</h3>
                            <p class="text-sm text-muted-foreground mt-1"><span class="font-medium text-foreground/85">${esc(item.institution)}</span> • ${esc(item.period)}</p>
                            <ul class="mt-4 space-y-2 list-disc list-inside text-sm sm:text-base text-muted-foreground leading-relaxed">${item.highlights.map((h) => `<li>${esc(h)}</li>`).join('')}</ul>
                        </div>`
                    )
                    .join('')}
            </div>`,
        })}
        ${sectionCard({
            title: isId ? 'Pembelajaran Berkelanjutan' : 'Continuous Learning',
            body: `<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                ${data.education.continuous.map((l) => `<div class="rounded-lg border border-border bg-background/50 p-5"><h3 class="font-semibold text-base text-foreground">${esc(l.title)}</h3><p class="text-sm text-muted-foreground mt-2 leading-relaxed">${esc(l.description)}</p></div>`).join('')}
            </div>`,
        })}
    </div>`;
}

function renderSkills(locale, data) {
    const isId = locale === 'id';
    return `<div class="space-y-8">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">${esc(data.ui.nav.skills)}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${isId ? 'Hard skills, perangkat AI/ML, dan soft skills yang saya gunakan dalam proyek nyata di GitHub.' : 'Hard skills, AI/ML frameworks, and soft skills demonstrated across my real GitHub repositories.'}</p>
        </div>
        ${sectionCard({
            title: 'Hard Skills',
            body: `<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                ${data.skills.hard
                    .map(
                        (g) => `<div class="rounded-lg border border-border bg-background/40 p-5 sm:p-6">
                            <h3 class="font-semibold text-base sm:text-lg text-foreground mb-4">${esc(g.title)}</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                ${g.items
                                    .map(
                                        (it) => `<div class="flex flex-col items-center justify-center p-3 border border-border/80 bg-card rounded-lg text-center hover:border-primary/45 transition-colors">
                                            <span class="h-8 w-8 rounded-md bg-primary/10 text-primary flex items-center justify-center font-mono text-xs font-bold mb-2">${esc(it.replace(/[^A-Za-z0-9]/g, '').slice(0, 2).toUpperCase())}</span>
                                            <span class="text-xs sm:text-sm font-medium text-foreground leading-snug">${esc(it)}</span>
                                        </div>`
                                    )
                                    .join('')}
                            </div>
                        </div>`
                    )
                    .join('')}
            </div>`,
        })}
        ${sectionCard({
            title: 'Soft Skills',
            body: `<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                ${data.skills.soft.map((s) => `<div class="rounded-lg border border-border bg-background/40 p-5"><h3 class="font-semibold text-foreground">${esc(s.title)}</h3><p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">${esc(s.desc)}</p></div>`).join('')}
            </div>`,
        })}
        ${sectionCard({
            title: isId ? 'Bahasa' : 'Languages',
            body: `<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                ${data.skills.languages.map((l) => `<div class="rounded-lg border border-border bg-background/40 p-5 flex items-center justify-between gap-4"><div><h3 class="font-semibold text-foreground">${esc(l.name)}</h3><p class="text-sm text-muted-foreground mt-0.5">${esc(l.level)}</p></div><span class="h-2.5 w-2.5 rounded-full bg-primary shrink-0"></span></div>`).join('')}
            </div>`,
        })}
    </div>`;
}

function renderBlog(locale, data) {
    const isId = locale === 'id';
    const categories = [...new Set(data.blogPosts.map((p) => p.category))];
    return `<div x-data="{
            search: '',
            category: 'all',
            matches(title, excerpt, cat) {
                const catOk = this.category === 'all' || cat === this.category;
                if (!catOk) return false;
                const q = this.search.trim().toLowerCase();
                if (!q) return true;
                return title.toLowerCase().includes(q) || excerpt.toLowerCase().includes(q) || cat.toLowerCase().includes(q);
            }
        }" class="space-y-6">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">Blog</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${isId ? 'Catatan teknis dan pembelajaran dari proyek nyata seputar Web Development, Information Retrieval, NLP, dan Machine Learning.' : 'Technical notes and engineering lessons from building Web, Information Retrieval, NLP, and Machine Learning projects.'}</p>
        </div>
        <div class="relative">
            ${icon('search', 'w-4 h-4 text-muted-foreground absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none')}
            <input type="search" x-model="search" aria-label="${isId ? 'Cari artikel' : 'Search articles'}" placeholder="${isId ? 'Cari artikel...' : 'Search articles...'}" class="flex h-10 w-full rounded-xl border border-border bg-card pl-10 pr-4 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
        </div>
        <div class="overflow-x-auto no-scrollbar pb-1">
            <div role="tablist" class="inline-flex items-center rounded-full bg-muted/80 p-1 gap-1 border border-border">
                <button type="button" role="tab" @click="category = 'all'" :aria-selected="category === 'all'" :class="category === 'all' ? 'bg-card text-foreground shadow-xs' : 'text-muted-foreground hover:text-foreground'" class="whitespace-nowrap px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all">${esc(data.ui.actions.all)}</button>
                ${categories.map((cat) => `<button type="button" role="tab" @click="category = '${cat}'" :aria-selected="category === '${cat}'" :class="category === '${cat}' ? 'bg-card text-foreground shadow-xs' : 'text-muted-foreground hover:text-foreground'" class="whitespace-nowrap px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium transition-all">${esc(cat)}</button>`).join('')}
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            ${data.blogPosts.map((post) => `<div x-show="matches(${escAttrJs(post.title)}, ${escAttrJs(post.excerpt)}, ${escAttrJs(post.category)})">${blogCard(locale, post, data.ui.actions.read_more)}</div>`).join('')}
        </div>
    </div>`;
}

function renderBlogDetail(locale, data, post) {
    const isId = locale === 'id';
    const related = data.projects.find((p) => p.slug === post.related_project);
    return `<article class="space-y-8">
        <div>
            <a href="${routeUrl(locale, '/blog')}" class="inline-flex h-9 items-center gap-2 rounded-md border border-border bg-card px-4 text-sm font-medium text-foreground hover:bg-accent transition-colors">
                ${icon('arrow-left', 'w-4 h-4')}<span>${esc(data.ui.actions.back_to_blog)}</span>
            </a>
        </div>
        <header class="space-y-4">
            <div class="flex flex-wrap items-center gap-2.5 text-xs text-muted-foreground">
                <span class="inline-flex items-center rounded-full bg-primary/12 px-3 py-0.5 font-semibold text-primary">${esc(post.category)}</span>
                <span class="inline-flex items-center gap-1 font-mono">${icon('calendar', 'w-3.5 h-3.5')}${esc(post.date)}</span>
                <span>•</span>
                <span class="inline-flex items-center gap-1">${icon('clock', 'w-3.5 h-3.5')}${esc(post.read_time)}</span>
            </div>
            <h1 class="text-2xl sm:text-4xl font-bold tracking-tight text-foreground leading-tight">${esc(post.title)}</h1>
            <p class="text-base sm:text-lg text-muted-foreground leading-relaxed">${esc(post.excerpt)}</p>
        </header>
        <div class="overflow-hidden rounded-xl border border-border bg-card">
            <img src="${assetUrl(post.image)}" alt="${esc(post.title)}" class="w-full aspect-[16/9] object-cover">
        </div>
        ${sectionCard({
            body: `<div class="space-y-6">
                ${post.sections.map((s) => `<div class="space-y-2.5"><h2 class="text-xl font-bold text-foreground">${esc(s.heading)}</h2><p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${esc(s.body)}</p></div>`).join('')}
            </div>`,
        })}
        ${
            related
                ? sectionCard({
                      title: isId ? 'Proyek GitHub Terkait' : 'Related GitHub Project',
                      body: `<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 rounded-lg border border-border bg-background/50 p-4 sm:p-5">
                          <div><h3 class="font-semibold text-foreground">${esc(related.title)}</h3><p class="text-sm text-muted-foreground mt-1">${esc(related.summary)}</p></div>
                          <div class="flex items-center gap-2 shrink-0">
                              <a href="${routeUrl(locale, `/projects/${related.slug}`)}" class="inline-flex h-9 items-center gap-1.5 rounded-md bg-primary px-4 text-xs sm:text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors"><span>${isId ? 'Lihat Studi Kasus' : 'View Case Study'}</span>${icon('arrow-right', 'w-4 h-4')}</a>
                              <a href="${esc(related.github)}" target="_blank" rel="noopener noreferrer" class="inline-flex h-9 items-center gap-1.5 rounded-md border border-border bg-card px-3.5 text-xs sm:text-sm font-medium text-foreground hover:bg-accent transition-colors">${icon('github', 'w-4 h-4')}<span>Repo</span></a>
                          </div>
                      </div>`,
                  })
                : ''
        }
    </article>`;
}

function renderContact(locale, data) {
    const { profile, ui } = data;
    const isId = locale === 'id';
    return `<div class="space-y-8" x-data="{
            name: '', email: '', subject: '', message: '', sent: false,
            submitForm() {
                if (!this.name.trim() || !this.email.trim() || !this.subject.trim() || !this.message.trim()) return;
                this.sent = true;
                const body = encodeURIComponent('Halo Pramajaya,\\n\\n' + this.message + '\\n\\n— ' + this.name + ' (' + this.email + ')');
                window.location.href = 'mailto:${esc(profile.email)}?subject=' + encodeURIComponent(this.subject) + '&body=' + body;
            }
        }">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">${esc(ui.nav.contact)}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${isId ? 'Hubungi saya untuk kolaborasi proyek web, riset AI/ML, atau peluang kerja sama.' : 'Reach out for web development collaborations, AI/ML research, or engineering opportunities.'}</p>
        </div>

        <div x-show="sent" x-cloak role="status" class="rounded-xl border border-primary/35 bg-primary/10 px-4 py-3 text-sm text-foreground flex items-start gap-3">
            ${icon('check', 'w-5 h-5 text-primary shrink-0 mt-0.5')}
            <span>${isId ? 'Aplikasi email Anda dibuka dengan pesan siap kirim. Anda juga bisa menghubungi langsung melalui email atau GitHub di samping.' : 'Your email client has been opened with your pre-filled message. You can also connect directly via email or GitHub.'}</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                ${sectionCard({
                    body: `<form @submit.prevent="submitForm()" class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="name" class="text-sm font-medium text-foreground block">${isId ? 'Nama' : 'Name'}</label>
                                <input id="name" x-model="name" type="text" required placeholder="${isId ? 'Nama Anda' : 'Your name'}" class="flex h-10 w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-medium text-foreground block">Email</label>
                                <input id="email" x-model="email" type="email" required placeholder="email@example.com" class="flex h-10 w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="subject" class="text-sm font-medium text-foreground block">${isId ? 'Subjek' : 'Subject'}</label>
                            <input id="subject" x-model="subject" type="text" required placeholder="${isId ? 'Subjek pesan Anda' : 'Subject of your message'}" class="flex h-10 w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                        </div>
                        <div class="space-y-2">
                            <label for="message" class="text-sm font-medium text-foreground block">${isId ? 'Pesan' : 'Message'}</label>
                            <textarea id="message" x-model="message" rows="5" required placeholder="${isId ? 'Ceritakan tentang proyek, ide, atau pertanyaan Anda...' : 'Tell me about your project, idea, or question...'}" class="flex w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary resize-y"></textarea>
                        </div>
                        <button type="submit" class="inline-flex h-11 items-center justify-center gap-2 rounded-md bg-primary px-6 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors w-full sm:w-auto">
                            ${icon('mail', 'w-4 h-4')}<span>${esc(ui.actions.send_message)}</span>
                        </button>
                    </form>`,
                })}
            </div>
            <div class="space-y-4">
                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">${icon('mail', 'w-4 h-4')}<h2>Email</h2></div>
                    <a href="mailto:${esc(profile.email)}" class="text-sm text-foreground hover:text-primary underline-offset-4 hover:underline break-all block">${esc(profile.email)}</a>
                </div>
                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">${icon('github', 'w-4 h-4')}<h2>GitHub</h2></div>
                    <a href="${esc(profile.github)}" target="_blank" rel="noopener noreferrer" class="text-sm text-foreground hover:text-primary underline-offset-4 hover:underline block">github.com/pramacoder</a>
                </div>
                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">${icon('map-pin', 'w-4 h-4')}<h2>${isId ? 'Lokasi' : 'Location'}</h2></div>
                    <p class="text-sm text-muted-foreground">${esc(profile.location)}</p>
                    <p class="text-xs text-muted-foreground">${esc(profile.university)}</p>
                </div>
                <div class="rounded-xl border border-border bg-card p-5 space-y-1.5">
                    <div class="flex items-center gap-2 text-primary font-semibold text-sm">${icon('clock', 'w-4 h-4')}<h2>${isId ? 'Ketersediaan' : 'Availability'}</h2></div>
                    <p class="text-sm text-muted-foreground leading-relaxed">${isId ? 'Terbuka untuk kolaborasi proyek web, riset AI/Data Science, dan kesempatan magang.' : 'Open to web development projects, AI/Data Science research collaborations, and internships.'}</p>
                </div>
            </div>
        </div>
    </div>`;
}

function renderLinks(locale, data) {
    const isId = locale === 'id';
    const categories = [...new Set(data.links.map((l) => l.category))];
    return `<div x-data="{
            search: '', category: 'all',
            matches(title, desc, cat) {
                const catOk = this.category === 'all' || cat === this.category;
                if (!catOk) return false;
                const q = this.search.trim().toLowerCase();
                if (!q) return true;
                return title.toLowerCase().includes(q) || desc.toLowerCase().includes(q) || cat.toLowerCase().includes(q);
            }
        }" class="space-y-6">
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">${esc(data.ui.nav.links)}</h1>
            <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">${isId ? 'Akses cepat ke profil GitHub, demo aplikasi live, repositori utama, dan dokumen CV saya.' : 'Quick access to my GitHub profile, live deployed apps, flagship repositories, and downloadable CV.'}</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 max-w-2xl">
            <div class="relative flex-1">
                ${icon('search', 'w-4 h-4 text-muted-foreground absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none')}
                <input type="search" x-model="search" aria-label="${isId ? 'Cari tautan' : 'Search links'}" placeholder="${isId ? 'Cari tautan...' : 'Search links...'}" class="h-10 w-full rounded-xl border border-border bg-card pl-10 pr-4 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
            </div>
            <select x-model="category" aria-label="${isId ? 'Filter kategori' : 'Filter category'}" class="h-10 rounded-xl border border-border bg-card px-3.5 text-sm font-medium text-foreground focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                <option value="all">${esc(data.ui.actions.all)}</option>
                ${categories.map((c) => `<option value="${esc(c)}">${esc(c)}</option>`).join('')}
            </select>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            ${data.links
                .map(
                    (item) => `<a href="${esc(item.url)}" target="_blank" rel="noopener noreferrer" x-show="matches(${escAttrJs(item.title)}, ${escAttrJs(item.description)}, ${escAttrJs(item.category)})" class="group flex flex-col justify-between rounded-xl border border-border bg-card p-5 transition-all duration-200 hover:-translate-y-0.5 hover:border-primary/45 hover:shadow-md">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="inline-flex items-center rounded-full bg-primary/10 px-2.5 py-0.5 text-xs font-semibold text-primary">${esc(item.category)}</span>
                                ${icon('arrow-up-right', 'w-4 h-4 text-muted-foreground group-hover:text-primary transition-colors')}
                            </div>
                            <h2 class="font-semibold text-base text-foreground group-hover:text-primary transition-colors">${esc(item.title)}</h2>
                            <p class="text-sm text-muted-foreground mt-1.5 leading-relaxed">${esc(item.description)}</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-border/70 font-mono text-xs text-muted-foreground truncate">${esc(item.tag)}</div>
                    </a>`
                )
                .join('')}
        </div>
    </div>`;
}

function writeHtml(routePath, html) {
    const clean = routePath.replace(/^\/+|\/+$/g, '');
    const filePath = clean ? path.join(DIST, clean, 'index.html') : path.join(DIST, 'index.html');
    fs.mkdirSync(path.dirname(filePath), { recursive: true });
    fs.writeFileSync(filePath, html, 'utf8');
}

function copyDir(src, dest) {
    if (!fs.existsSync(src)) return;
    fs.mkdirSync(dest, { recursive: true });
    for (const entry of fs.readdirSync(src, { withFileTypes: true })) {
        const s = path.join(src, entry.name);
        const d = path.join(dest, entry.name);
        if (entry.isDirectory()) copyDir(s, d);
        else fs.copyFileSync(s, d);
    }
}

// 1. Build CSS & JS via Vite into dist/assets/
console.log('[1/4] Building CSS & JS assets with Vite...');
execSync('npx vite build --config vite.static.config.js', { stdio: 'inherit', cwd: ROOT });

// Remove dummy empty JS entry emitted for style input if present
const styleJs = path.join(DIST, 'assets/style.js');
if (fs.existsSync(styleJs)) fs.unlinkSync(styleJs);

// 2. Copy static public assets into dist/
console.log('[2/4] Copying images, CV PDF, favicon, and robots.txt...');
copyDir(path.join(ROOT, 'public/images'), path.join(DIST, 'images'));
copyDir(path.join(ROOT, 'public/documents'), path.join(DIST, 'documents'));
for (const file of ['favicon.ico', 'robots.txt']) {
    const src = path.join(ROOT, 'public', file);
    if (fs.existsSync(src)) fs.copyFileSync(src, path.join(DIST, file));
}

// 3. Render all static pages for ID and EN
console.log('[3/4] Rendering bilingual static HTML pages...');
const sitemapUrls = [];
let pageCount = 0;

for (const locale of ['id', 'en']) {
    const data = rawData.locales[locale];
    const { profile, ui, projects, blogPosts } = data;

    const emit = (subRoute, activeNav, title, description, content) => {
        const fullRoute = routeUrl(locale, subRoute);
        const html = layout({ locale, data, title, description, activeNav, currentRoutePath: subRoute, content });
        writeHtml(fullRoute, html);
        sitemapUrls.push(SITE_URL + fullRoute);
        pageCount++;
    };

    emit('/', 'home', `${profile.name} — ${profile.headline_role}`, profile.intro, renderHome(locale, data));
    emit('/about', 'about', `${ui.nav.about} — ${profile.name}`, profile.intro, renderAbout(locale, data));
    emit('/projects', 'projects', `${ui.nav.projects} — ${profile.name}`, profile.intro, renderProjects(locale, data));
    emit('/experience', 'experience', `${ui.nav.experience} — ${profile.name}`, profile.intro, renderExperience(locale, data));
    emit('/education', 'education', `${ui.nav.education} — ${profile.name}`, profile.intro, renderEducation(locale, data));
    emit('/skills', 'skills', `${ui.nav.skills} — ${profile.name}`, profile.intro, renderSkills(locale, data));
    emit('/blog', 'blog', `${ui.nav.blog} — ${profile.name}`, profile.intro, renderBlog(locale, data));
    emit('/contact', 'contact', `${ui.nav.contact} — ${profile.name}`, profile.intro, renderContact(locale, data));
    emit('/links', 'links', `${ui.nav.links} — ${profile.name}`, profile.intro, renderLinks(locale, data));

    for (const project of projects) {
        emit(`/projects/${project.slug}`, 'projects', `${project.title} — ${profile.name}`, project.summary, renderProjectDetail(locale, data, project));
    }
    for (const post of blogPosts) {
        emit(`/blog/${post.slug}`, 'blog', `${post.title} — ${profile.name}`, post.excerpt, renderBlogDetail(locale, data, post));
    }
}

// 4. Write 404.html and sitemap.xml
const dataId = rawData.locales.id;
const notFoundHtml = layout({
    locale: 'id',
    data: dataId,
    title: '404 — Halaman Tidak Ditemukan | Pramajaya',
    description: 'Halaman yang Anda cari tidak ditemukan.',
    activeNav: '',
    currentRoutePath: '/',
    content: sectionCard({
        cls: 'my-12',
        body: `<div class="py-12 text-center space-y-4">
            <p class="font-mono text-sm font-semibold text-primary">404</p>
            <h1 class="text-2xl sm:text-3xl font-bold text-foreground">Halaman Tidak Ditemukan</h1>
            <p class="text-sm sm:text-base text-muted-foreground max-w-md mx-auto">Halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
            <div class="pt-2"><a href="/" class="inline-flex h-10 items-center gap-2 rounded-md bg-primary px-6 text-sm font-medium text-primary-foreground hover:bg-primary-hover transition-colors">${icon('arrow-left', 'w-4 h-4')}<span>Kembali ke Beranda</span></a></div>
        </div>`,
    }),
});
fs.writeFileSync(path.join(DIST, '404.html'), notFoundHtml, 'utf8');

const today = new Date().toISOString().slice(0, 10);
const sitemapXml =
    `<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n` +
    sitemapUrls.map((u) => `  <url><loc>${esc(u)}</loc><lastmod>${today}</lastmod></url>`).join('\n') +
    `\n</urlset>\n`;
fs.writeFileSync(path.join(DIST, 'sitemap.xml'), sitemapXml, 'utf8');

console.log(`[4/4] Done! Built ${pageCount} static pages + 404.html + sitemap.xml into dist/.`);
