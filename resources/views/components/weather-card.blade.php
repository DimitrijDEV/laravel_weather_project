<div class="text-center text-light py-3 mt-4" style="background-color: #58557d">
    <h3>{{ date('l', $weather->dt) }}</h3>
    <x-weather-icon :weather="$weather" style="width: 50px; height: 50px" />
    <h3 class="my-3 text-ligt">
        {{ (int) ($weather->temp->day - 273.15) }} <span>&#8451;</span>
    </h3>
    <p>{{ $weather->weather[0]->main }}</p>
</div>
