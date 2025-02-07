<li class="nav-item">
    <a href="{{ route('marks.year_select', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.show', 'marks.year_selector', 'locked']) ? 'active' : '' }}"><i class="icon-book"></i><span>Nilai</span> </a>
</li>
<li class="nav-item">
    <a href="{{ route('notes.student', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['notes.student']) ? 'active' : '' }} "><i class="icon-book"></i><span> Catatan</span></a>
</li>


