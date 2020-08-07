<ul>
    @foreach (['Home','Explore','Messages','Booksmarks','Lists','Profile','More'] as $link)
        <li>
            <a href="/{{ Str::slug($link) }}" class="font-bold text-lg mb-4 block">{{ $link }}</a>
        </li>
    @endforeach
</ul>
