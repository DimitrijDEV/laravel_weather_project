<div class="text-center text-light py-3 mt-4" style="background-color: #58557d">
    <h3>{{ date('l', $weather->dt) }}</h3>
    <div id="icon">
        <img id="wicon" style="width: 50px; height: 50px"
            src="{{ 'http://openweathermap.org/img/w/' . $weather->weather[0]->icon . '.png' }}"
            alt="Weather icon" />
    </div>
    <h3 class="my-3 text-ligt">
        {{ (int) ($weather->temp->day - 273.15) }} <span>&#8451;</span>
    </h3>
    <p>{{ $weather->weather[0]->main }}</p>
</div>
