<h3 class="font-bold mb-4 text-xl">Friends</h3>
<ul>
    @foreach (range(1,8) as $user)
        <li class="mb-4">
            <div class="lg:flex items-center text-s">
                <img src="https://i.pravatar.cc/40" class="rounded-full mr-2" alt=""> John Doe
            </div>
        </li>
    @endforeach
</ul>
