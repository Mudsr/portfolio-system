<div>
    <div class="row">
        <div class="col-md-12 container">
            <div  class="topbar-item">
                <div class="d-flex mt-4 mr-5">
                    <form action="{{ route('switch.portfolio') }}" method="post" id="switch_portfolio">
                        @csrf
                        <div class="form-group row">
                            <select class="form-control" name="portfolio" onchange="this.form.submit()">
                                @foreach ($portfolios as $portfolio)
                                    <option value="{{ $portfolio->id }}" @if($portfolio->id == $currentPortfolio->id) selected @endif >
                                        {{ $portfolio->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

        {{-- <div class="col-md-5">
            @include('livewire.dashboard.partials.upcoming-rents')
        </div> --}}

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('livewire.dashboard.partials.contracts-renewals')
                </div>
                {{-- <div class="col-md-12">
                    @include('livewire.dashboard.partials.alerts')
                </div> --}}
            </div>

        </div>
    </div>
</div>
