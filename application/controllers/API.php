<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class API extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Utility_Model');

    }
    public function index()
    {
       

    }
    public function fetchNews() 
    {
        $apiKey = '9046f25f3e464b39a4cad1840cc86d3e'; 
        $url = 'https://newsapi.org/v2/top-headlines?country=in';
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: Task Manager', 
            'Authorization: Bearer ' . $apiKey 
        ]);
    
        $response = curl_exec($ch);
        curl_close($ch);
    
        $data = json_decode($response, true);
    
        if ($data && $data['status'] === 'ok') {
            echo json_encode($data['articles']); 
        } else {
            echo json_encode([]); 
        }
    }
    public function GetWeatherr()
    {
        $apiKey = 'f5a9f9a659049e9d3bce36829db1e1b0';
        $city = 'Dubai';

        $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            echo "Failed to fetch weather data.";
        } else {
            $weather = json_decode($response, true);

            if ($weather['cod'] === 200) {
                $temperature = $weather['main']['temp'];
                $description = $weather['weather'][0]['description'];

                echo "Temperature: " . round($temperature - 273.15, 2) . "°C<br>";
                echo "Description: " . ucfirst($description) . "<br>";
            } else {
                echo "Error: " . $weather['message'];
            }
        }

        curl_close($ch);
    }
    public function GetWeather()
    {
        $apiKey = 'f5a9f9a659049e9d3bce36829db1e1b0';
        $city = 'Dubai'; 

        $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        header('Content-Type: application/json');
        echo $response;
    }

    
}
?>