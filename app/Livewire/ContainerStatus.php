<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Container;

class ContainerStatus extends Component
{
    public $containerStatus;
    public $containerId;

    // Receive the containerId when the component is mounted
    public function mount($containerId)
    {
        $this->containerId = $containerId;  // Store the containerId in the component
        $this->containerStatus = Container::find($containerId)->status;  // Get the status of the container
    }

    public function render()
    {
        return view('livewire.container-status');
    }

    // Update the container status
    public function getStatus()
    {
        $this->containerStatus = Container::find($this->containerId)->status; // Fetch the latest status
    }

    // Optional: Event listener for status updates (from broadcasting or other sources)
    protected $listeners = ['statusUpdated' => 'getStatus'];
}
