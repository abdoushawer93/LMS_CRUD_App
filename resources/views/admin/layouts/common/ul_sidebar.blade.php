<li class="nav-item">
    <a href="{{ route('students.index') }}"
       class="nav-link {{ Request::is('admin/students*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Students</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('teachers.index') }}"
       class="nav-link {{ Request::is('admin/teachers*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Teachers</p>
    </a>
</li>
