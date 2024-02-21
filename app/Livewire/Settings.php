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
        $this->settings = Extensions::list()
            ->mapWithKeys(fn ($extension) => [$extension::class => [
                'title' => $extension->title,
                'enabled' => true,
                'commands' => collect($extension->commands)
                    ->mapWithKeys(fn ($extension) => [$extension->name => [
                        'title' => $extension->title,
                        'alias' => '',
                        'hotkey' => '',
                        'enabled' => true,
                    ]])
                    ->all(),
            ]])
            ->merge(self::meta('extensions')->first()) // TODO: We keeping removed extensions data?
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
    public function aside()
    {
        if (! $this->selected) {
            return;
        }

        if (! str_contains($this->selected, '.')) {
            $extension = $this->extensions->firstWhere(fn ($item) => $item::class == $this->selected);

            if (method_exists($extension, 'settings')) {
                return $extension->settings();
            }
        }

        if (str_contains($this->selected, '.')) {
            [$extension, $command] = explode('.', $this->selected);
            $extension = $this->extensions->firstWhere(fn ($item) => $item::class == $extension);
            $command = $extension->commands->firstWhere('name', $command);

            if ($command->settings) {
                return ($command->settings)();
            }
        }
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
