<?php

namespace Visualbuilder\EmailTemplates;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Visualbuilder\EmailTemplates\Resources\EmailTemplateResource;
use Visualbuilder\EmailTemplates\Resources\EmailTemplateThemeResource;

class EmailTemplatesPlugin implements Plugin
{
    public string $navigationGroup;

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public function getId(): string
    {
        return 'filament-email-templates';
    }

    public function navigationGroup($navigationGroup): static
    {
        $this->navigationGroup = $navigationGroup;
        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return $this->navigationGroup ?? config('filament-email-templates.navigation.templates.group');
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
                EmailTemplateResource::class,
                EmailTemplateThemeResource::class,
        ]);

    }

    public function boot(Panel $panel): void
    {
        //
    }
}
