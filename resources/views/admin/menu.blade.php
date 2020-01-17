<ul class="list-group list-group-flush bg-transparent">
    <li class="list-group-item @if(request()->url() == url('admin/global_settings'))active @endif">
        <a href="{{ url('admin/global_settings') }}">@lang('admin.global_settings.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/slides'))active @endif">
        <a href="{{ url('admin/slides') }}">@lang('admin.slides.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/tariffs'))active @endif">
        <a href="{{ url('admin/tariffs') }}">@lang('admin.tariffs.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/tariff_groups'))active @endif">
        <a href="{{ url('admin/tariff_groups') }}">@lang('admin.tariff_groups.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/tariff_types'))active @endif">
        <a href="{{ url('admin/tariff_types') }}">@lang('admin.tariff_types.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/telephones'))active @endif">
        <a href="{{ url('admin/telephones') }}">@lang('admin.telephones.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/streets'))active @endif">
        <a href="{{ url('admin/streets') }}">@lang('admin.streets.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/houses'))active @endif">
        <a href="{{ url('admin/houses') }}">@lang('admin.houses.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/questions'))active @endif">
        <a href="{{ url('admin/questions') }}">@lang('admin.questions.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/question_types'))active @endif">
        <a href="{{ url('admin/question_types') }}">@lang('admin.question_types.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/jobopenings'))active @endif">
        <a href="{{ url('admin/jobopenings') }}">@lang('admin.jobopenings.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/equipments'))active @endif">
        <a href="{{ url('admin/equipments') }}">@lang('admin.equipments.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/antiviruses'))active @endif">
        <a href="{{ url('admin/antiviruses') }}">@lang('admin.antiviruses.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/antivirus_periods'))active @endif">
        <a href="{{ url('admin/antivirus_periods') }}">@lang('admin.antivirus_periods.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/antivirus_types'))active @endif">
        <a href="{{ url('admin/antivirus_types') }}">@lang('admin.antivirus_types.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/news'))active @endif">
        <a href="{{ url('admin/news') }}">@lang('admin.news.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/services'))active @endif">
        <a href="{{ url('admin/services') }}">@lang('admin.services.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/period_types'))active @endif">
        <a href="{{ url('admin/period_types') }}">@lang('admin.period_types.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/posts'))active @endif">
        <a href="{{ url('admin/posts') }}">@lang('admin.posts.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/payment_methods'))active @endif">
        <a href="{{ url('admin/payment_methods') }}">@lang('admin.payment_methods.title')</a>
    </li>
    <li class="list-group-item @if(request()->url() == url('admin/packages'))active @endif">
        <a href="{{ url('admin/packages') }}">@lang('admin.packages.title')</a>
    </li>
</ul>
