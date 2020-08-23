<ul class="hidden lg:block">
    @foreach (['Home','Explore','Messages','Booksmarks','Lists','Profiles/'.current_user()->username,'More'] as $link)
        <li>
            <a href="/{{ Str::of($link)->lower() }}" class="font-bold text-lg mb-4 block">
                @if ($loop->index === 5)
                    Profiles
                @else
                    {{ $link }}
                @endif
            </a>
        </li>
    @endforeach
</ul>
