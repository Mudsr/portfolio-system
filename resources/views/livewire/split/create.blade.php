@section('styles')
    <link href="{{ asset('metronic/assets/css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-body p-0">
                    <form action="{{ route('split.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                            <!--begin: Wizard Nav-->
                            <div class="wizard-nav">
                                <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                                    <!--begin::Wizard Step 1 Nav-->
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>1.</span>Select Plot</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 1 Nav-->

                                    <!--begin::Wizard Step 2 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>2.</span>Plot1 Detail</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 2 Nav-->

                                    <!--begin::Wizard Step 3 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>3.</span>Plot1 Documents</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 3 Nav-->

                                    <!--begin::Wizard Step 4 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>3.</span>Plot2 Detail</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 4 Nav-->

                                    <!--begin::Wizard Step 5 Nav-->
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <h3 class="wizard-title">
                                            <span>3.</span>Plot2 Detail</h3>
                                            <div class="wizard-bar"></div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 5 Nav-->

                                </div>
                            </div>
                            <!--end: Wizard Nav-->
                            <!--begin: Wizard Body-->
                            <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                <div class="col-xl-12">
                                    <!--begin: Wizard Form-->
                                    <form class="form" id="kt_form">
                                        <!--begin: Wizard Step 1-->
                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                           @include('livewire.split.wizard.general-detail')
                                        </div>
                                        <!--end: Wizard Step 1-->

                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            @include('livewire.split.wizard.new-plot', ['name' => 'plot1'])
                                        </div>
                                        <!--end: Wizard Step 2-->

                                        <!--begin: Wizard Step 3-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            @include('livewire.split.wizard.new-plot-documents', ['name'=> 'plot1'])
                                        </div>
                                        <!--end: Wizard Step 3-->

                                        <!--begin: Wizard Step 4-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            @include('livewire.split.wizard.new-plot', ['name' => 'plot2'])
                                        </div>
                                        <!--end: Wizard Step 4-->

                                        <!--begin: Wizard Step 5-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            @include('livewire.split.wizard.new-plot-documents', ['name' => 'plot2'])
                                        </div>
                                        <!--end: Wizard Step 5-->

                                        <!--begin: Wizard Actions-->
                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                            </div>
                                        </div>
                                        <!--end: Wizard Actions-->

                                    </form>
                                    <!--end: Wizard Form-->
                                </div>
                            </div>
                            <!--end: Wizard Body-->
                        </div>
                        <!--end: Wizard-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @if (!empty($plotDetail))
            <div class="col-md-12 mt-4">
                @include('livewire.merge.partials.plot', ['plot' => $plotDetail, 'name' => 'Old Plot'])
            </div>
        @endif
    </div>
</div>
@section('scripts')
    <script src="{{ asset('js/split-wizard.js') }}"></script>

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

