<div>
    <div class="row">
        <div class="col-md-5">
            @include('livewire.dashboard.partials.pending-tasks')
        </div>

        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    @include('livewire.dashboard.partials.upcoming-renewals')
                </div>
                {{-- <div class="col-md-12">
                    @include('livewire.dashboard.partials.alerts')
                </div> --}}
            </div>

        </div>
    </div>
</div>
