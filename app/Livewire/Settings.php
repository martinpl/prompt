<?php

namespace App\Livewire;

use App\Extensions;
use App\Meta;
use Livewire\Attributes\Computed;

class Settings extends \Livewire\Component
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

    public static function meta($key)
    {
        return new Meta('settings', $key);
    }

    #[Computed]
    public function extensions()
    {
        return Extensions::list();
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
        self::meta('extensions')->save($this->settings);
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
