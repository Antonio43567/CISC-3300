$(document).ready(function() {
    const apiUrl = "https://api.open-meteo.com/v1/forecast";
    const parameters = {
        latitude: "52.52", // Example latitude, adjust as needed
        longitude: "13.41", // Example longitude, adjust as needed
        current: "temperature_2m,wind_speed_10m",
        hourly: "temperature_2m,relative_humidity_2m,wind_speed_10m"
    };

    $.get(apiUrl, parameters, function(data) {
        displayWeather(data);
    });
});

function displayWeather(data) {
    const $weather = $('#weather');
    $weather.empty(); // Clear previous data

    // Display current weather
    const currentWeather = `
        <h2>Current Weather</h2>
        <p>Time: ${data.current.time}</p>
        <p>Temperature: ${data.current.temperature_2m}°C</p>
        <p>Wind Speed: ${data.current.wind_speed_10m} km/h</p>
    `;
    $weather.append(currentWeather);

    // Display hourly forecast
    const hourlyForecast = `
        <h2>Hourly Forecast</h2>
        ${data.hourly.time.map((time, index) => `
            <div>
                <h3>${time}</h3>
                <p>Temperature: ${data.hourly.temperature_2m[index]}°C</p>
                <p>Humidity: ${data.hourly.relative_humidity_2m[index]}%</p>
                <p>Wind Speed: ${data.hourly.wind_speed_10m[index]} km/h</p>
            </div>
        `).join('')}
    `;
    $weather.append(hourlyForecast);
}
