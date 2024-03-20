<?php

namespace App\Livewire;


use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Collection;
use Livewire\Component;

class Dropdowns extends Component
{
    public Collection $countries;
    public Collection $cities;

    public int $country;
    public int $city;

    public function mount(): void
    {
        $this->countries = Country::pluck('name', 'id');
        $this->cities = collect();
    }

    public function updatedCountry($value): void
    {
        $this->cities = City::where('country_id', $value)->get();
        $this->city = $this->cities->first()->id;
    }

    public function render()
    {
        return view('livewire.dropdowns');
    }
}
