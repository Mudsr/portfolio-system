@section('styles')
    <link href="{{ asset('metronic/assets/css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-body p-0">

                        <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                            <!--begin: Wizard Nav-->
                            <div class="wizard-nav">
                                <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                                    <!--begin::Wizard Step 1 Nav-->
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>1.</span>General Detail</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 1 Nav-->
                                    <!--begin::Wizard Step 2 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>2.</span>New Plot Detail</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 2 Nav-->

                                    <!--begin::Wizard Step 2 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>3.</span>New Plot Documents</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 2 Nav-->

                                </div>
                            </div>
                            <!--end: Wizard Nav-->
                            <!--begin: Wizard Body-->
                            <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                <div class="col-xl-12">
                                    <!--begin: Wizard Form-->
                                    <form action="{{ route('merge.save') }}" method="POST" enctype="multipart/form-data" id="kt_form">
                                        @csrf
                                        <!--begin: Wizard Step 1-->
                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                           @include('livewire.merge.wizard.general-detail')
                                        </div>
                                        <!--end: Wizard Step 1-->
                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            @include('livewire.merge.wizard.new-plot')
                                        </div>
                                        <!--end: Wizard Step 2-->
                                        <!--begin: Wizard Step 3-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            @include('livewire.merge.wizard.new-plot-documents')
                                        </div>
                                        <!--end: Wizard Step 3-->

                                        <!--begin: Wizard Actions-->
                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                            </div>

                                            {{-- <div class="mr-2">
                                                <button type="button" wire:click="changeStep('previous')" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                <button type="button" wire:click="changeStep('next')" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                            </div> --}}
                                        </div>
                                        <!--end: Wizard Actions-->
                                    </form>
                                    <!--end: Wizard Form-->
                                </div>
                            </div>
                            <!--end: Wizard Body-->
                        </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @if (!empty($plot1))
            <div class="col-md-6 mt-4">
                @include('livewire.merge.partials.plot', ['plot' => $plot1, 'name' => 'Plot 1'])
            </div>
        @endif

        @if (!empty($plot2))
            <div class="col-md-6 mt-4">
                @include('livewire.merge.partials.plot', ['plot' => $plot2, 'name' => 'Plot 2'])
            </div>
        @endif
    </div>
</div>

@section('scripts')
    <script src="{{ asset('js/merge-wizard.js') }}"></script>

    <script>
        intializeSelectPicker()

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.sent', (message, component) => {
                $('.selectpicker2').selectpicker('destroy')
            })
            Livewire.hook('message.processed', (message, component) => {
                initializeWizard();
                intializeSelectPicker();

            })
        });

        function intializeSelectPicker() {
            $('.selectpicker2').selectpicker().on('hide.bs.select', function() {
                // fix dropup arrow icon on hide
                $(this).closest('.bootstrap-select').removeClass('dropup');
            });
        }

    </script>
@endsection
