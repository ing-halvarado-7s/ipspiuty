<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Afiliado;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class,function(BuildingMenu $event){
            if (Auth::user()->hasRole('Afiliado')) {
                $afiliado = Afiliado::where('user_id', Auth::user()->id)->first();
                $event->menu->add([
                    'text' => 'Afiliado',
                    'url'  => 'afiliado/'.$afiliado->id.'/edit',
                    'icon' => 'fas fa-fw fa-user',
                    'can'  => ['afiliado'],
                ]);
                $event->menu->add([
                    'text' => 'Beneficiarios',
                    'url'  => 'beneficiario/indexBeneficiario/'.$afiliado->id.'',
                    'icon' => 'fas fa-fw fa-user',
                    'can'  => ['afiliado'],
                ]);
            }
        });

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
