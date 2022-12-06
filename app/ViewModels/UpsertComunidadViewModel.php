<?php

namespace App\ViewModels;

final class UpsertComunidadViewModel extends ViewModel
{

    public function __construct(public ?Comunidad $comunidad = null)
    {
    }

    public function formData(): array
    {
        if ($this->comunidad){
            return $this->updateFormData();
        }

        return $this->createFormData();
    }

    protected function createFormData(): array
    {
        return;
    }

    protected function updateFormData(): array
    {
        return;
    }
}
