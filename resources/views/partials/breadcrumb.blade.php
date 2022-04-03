<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    @unless($breadcrumbs->isEmpty())
        <div class="content-header">
            <div class="container-fluid">
                @foreach ($breadcrumbs as $breadcrumb)
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $breadcrumb->title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @if (!is_null($breadcrumb->url) && !$loop->last)
                                    <li class="breadcrumb-item"><a
                                            href="@{{ $breadcrumb - > url }}">{{ $breadcrumb->title }}</a></li>
                                @else
                                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                                @endif
                            </ol>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endunless
</div>
