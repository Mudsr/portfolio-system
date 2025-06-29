
<!DOCTYPE html>
<html lang="en">
	<head><base href="">
		<meta charset="utf-8" />

		<title>@yield('title', 'Portfolio System')</title>

		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        @include('layouts.partials.styles')

        @livewireStyles

        @yield('styles')
	</head>

	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

        @include('layouts.partials.mobile-header')

		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">

                @include('layouts.partials.sidebar')

				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                    @include('layouts.partials.header')

					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="d-flex flex-column-fluid">
							<div class="container">
                                @include('layouts.partials.flash-notifications')
                                @yield('content')
							</div>
						</div>
					</div>
                    @include('layouts.partials.footer')
				</div>
			</div>
		</div>

        @include('layouts.partials.scripts')

        @livewireScripts

        @yield('scripts')

        <script>
            // register jQuery extension
            jQuery.extend(jQuery.expr[':'], {
                focusable: function (el, index, selector) {
                    return $(el).is('a, button, :input, [tabindex]');
                }
            });

            $(document).on('keypress', 'input,select', function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    // Get all focusable elements on the page
                    var $canfocus = $(':focusable');
                    var index = $canfocus.index(document.activeElement) + 1;
                    if (index >= $canfocus.length) index = 0;
                    $canfocus.eq(index).focus();
                }
            });
        </script>

	</body>
</html>
