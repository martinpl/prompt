<?php

namespace App\Livewire\Settings;

use App\Thing;
use App\Extensions as AppExtensions;
use Livewire\Attributes\Computed;

class Extensions extends \Livewire\Component
{
    public $settings;

    public $selected;

    public function mount()
    {
        $this->settings = $this->extensions()
            ->mapWithKeys(fn ($extension) => [$extension::class => [
                'enabled' => $extension::class::setting('enabled') ?? true,
                'commands' => $extension->commands->mapWithKeys(
                    fn ($command) => [$command->name => [
                        'enabled' => $extension::class::commandSetting($command->name, 'enabled') ?? true,
                        'alias' => $extension::class::commandSetting($command->name, 'alias') ?? '',
                        'hotkey' => $extension::class::commandSetting($command->name, 'hotkey') ?? '',
                    ]])
                    ->all(),
            ]])
            ->all();
    }

    #[Computed]
    public function extensions()
    {
        return AppExtensions::list();
    }

    #[Computed]
    public function selectedExtension()
    {
        if (str_contains($this->selected, '.') || ! $this->selected) {
            return;
        }

        return $this->extensions->firstWhere(fn ($item) => $item::class == $this->selected);
    }

    #[Computed]
    public function selectedCommand()
    {
        if (! str_contains($this->selected, '.')) {
            return;
        }

        [$extension, $command] = explode('.', $this->selected);
        $extension = $this->extensions->firstWhere(fn ($item) => $item::class == $extension);

        return $extension->commands->firstWhere('name', $command);
    }

    public function updatedSettings()
    {
        Thing::settings('extensions')->save($this->settings);
    }

    public function render()
    {
        return view('livewire.settings.extensions');
    }
}
