@if (!empty($links) && count($links) > 0)
    <ul>
        @foreach ($links as $pg)
            <li class="sidebar_links @if ($pg->name[app()->getLocale() . '_name'] == $data->name[app()->getLocale() . '_name']) active @endif"><a
                    href="{{ route('frontend.show', ['slug' => $pg->slugs[app()->getLocale() . '_slug'], 'page' => $page]) }}">{{ $pg->name[app()->getLocale() . '_name'] }}</a>
            </li>
        @endforeach
    </ul>
@endif
