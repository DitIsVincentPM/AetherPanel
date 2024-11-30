<?php

namespace App\Livewire;

use App\Models\Container;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Services\ContainerService;

class ContainerControls extends Component
{
    public $container;
    public $containerStatus;

    // Receive the containerId when the component is mounted
    public function mount($container)
    {
        $this->container = $container; // Store the container in the component
        $this->containerStatus = Container::find($container->id)->status; // Get the status of the container
    }

    // Update the container status
    public function getStatus()
    {
        $this->containerStatus = Container::find($this->container->id)->status; // Fetch the latest status
    }

    // Optional: Event listener for status updates (from broadcasting or other sources)
    protected $listeners = ['statusUpdated' => 'getStatus'];

    // Start the container
    public function startContainer()
    {
        $response = Http::post("http://localhost:3000/containers/{$this->container['docker_id']}/start");

        $containerService = new ContainerService();
        $containerService->updateContainerStatus($this->container['docker_id']);

        if ($response->successful()) {
            session()->flash('message', 'Container started successfully!');
        } else {
            session()->flash('error', 'Failed to start the container.');
        }
    }

    // Stop the container
    public function stopContainer()
    {
        $response = Http::post("http://localhost:3000/containers/{$this->container['docker_id']}/stop");

        $containerService = new ContainerService();
        $containerService->updateContainerStatus($this->container['docker_id']);

        if ($response->successful()) {
            session()->flash('message', 'Container stopped successfully!');
        } else {
            session()->flash('error', 'Failed to stop the container.');
        }
    }

    // Restart the container
    public function restartContainer()
    {
        $response = Http::post("http://localhost:3000/containers/{$this->container['docker_id']}/restart");

        $containerService = new ContainerService();
        $containerService->updateContainerStatus($this->container['docker_id']);

        if ($response->successful()) {
            session()->flash('message', 'Container restarted successfully!');
        } else {
            session()->flash('error', 'Failed to restart the container.');
        }
    }

    public function render()
    {
        return view('livewire.container-controls');
    }
}
