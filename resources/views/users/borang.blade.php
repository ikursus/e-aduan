
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email ?? old('email') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefon</label>
        <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? old('phone') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-control">
            <option value="USER"{{ $user->role == 'USER' ? ' selected="selected' : null }}>User</option>
            <option value="ADMIN"{{ $user->role == 'ADMIN' ? ' selected="selected' : null }}>Admin</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="ACTIVE"{{ $user->status == 'ACTIVE' ? ' selected="selected' : null }}>Active</option>
            <option value="INACTIVE"{{ $user->status == 'INACTIVE' ? ' selected="selected' : null }}>Inactive</option>
        </select>
    </div>

    </div>
