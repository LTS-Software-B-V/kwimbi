<?php
namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use App\Models\Task;
use App\Enums\Priority;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;
use Relaticle\CustomFields\Filament\Tables\Concerns\InteractsWithCustomFields;
use Illuminate\Support\Facades\Auth;
class ListTasks extends ListRecords
{
    use InteractsWithCustomFields;
    protected static string $resource = TaskResource::class;
    protected static ?string $title   = 'Alle acties';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalWidth(MaxWidth::FourExtraLarge)
                ->modalHeading('Taak toevoegen')
                ->modalDescription('Voeg een nieuwe taak toe door de onderstaande gegeven zo volledig mogelijk in te vullen.')
                ->slideOver()
                ->label('Taak toevoegen'),
        ];
    }
    public function getHeading(): string
    {
        return "Mijn taken - Overzicht";
    }


 

    public function getTabs(): array
    {
        return [
            'Alles'     => Tab::make(),
            'Hoog'      => Tab::make()
                ->ModifyQueryUsing(fn(Builder $query) => $query->where('priority', 1)->where('employee_id', auth()->id()))
                ->badgeColor('danger')
                ->badge(Task::query()->where('priority', Priority::HIGH)->where('employee_id', auth()->id())->count()),
            'Gemiddeld' => Tab::make()
                ->ModifyQueryUsing(fn(Builder $query) => $query->where('priority', 2)->where('employee_id', auth()->id()))
                ->badgeColor('warning')
                ->badge(Task::query()->where('priority', Priority::MEDIUM)->where('employee_id', auth()->id())->count()),
            'Laag'      => Tab::make()
                ->ModifyQueryUsing(fn(Builder $query) => $query->where('priority', 3)->where('employee_id', auth()->id()))
                ->badgeColor('success')
                ->badge(Task::query()->where('priority', Priority::LOW)->where('employee_id', auth()->id())->count()),
        ];
    }

}

 