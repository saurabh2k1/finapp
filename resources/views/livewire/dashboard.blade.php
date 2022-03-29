<div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8">
    <select wire:model="fYear" wire:onchange="changeYear($event.target.value)" >
        <option value=""> -- Select Year -- </option>
        @foreach ($years as $year)
            <option value="{{$year}}">{{$year}}</option>
        @endforeach
    </select>
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        {{-- <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $PATChartModel->reactiveKey() }}"
                :column-chart-model="$PATChartModel"
            />
        </div> --}}
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $multiColumnChart->reactiveKey() }}"
                :column-chart-model="$multiColumnChart"
            />
        </div>
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-line-chart
                key="{{ $PBTChartModel->reactiveKey() }}"
                :line-chart-model="$PBTChartModel"
            />
        </div>
    </div>
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-line-chart
                key="{{ $RevenueChartModel->reactiveKey() }}"
                :line-chart-model="$RevenueChartModel"
            />
        </div>
    </div>
</div>
