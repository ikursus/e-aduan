
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefon</label>
        <input type="text" class="form-control" name="phone">
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-control">
            <option value="USER">User</option>
            <option value="ADMIN">Admin</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    </div>
