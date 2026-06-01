@php
    use Filament\Facades\Filament;
@endphp

<x-filament-panels::page>
    <div class="space-y-6">
        <!-- Info Cards -->
        <div class="grid grid-cols-1 gap-4">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-sm font-semibold text-blue-900 mb-2">
                    Editing {{ $records->count() }} Records
                </h3>
                <div class="text-sm text-blue-700 space-y-1">
                    @foreach ($records as $record)
                        <div class="flex items-center gap-2">
                            <span class="inline-block w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center text-xs text-blue-900">•</span>
                            {{ $record->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Form -->
        <form wire:submit.prevent="save" class="space-y-6">
            {{ $this->form }}

            <!-- Actions -->
            <div class="flex gap-3 justify-start pt-4">
                @foreach ($this->getFormActions() as $action)
                    {{ $action }}
                @endforeach
            </div>
        </form>
    </div>
</x-filament-panels::page>

