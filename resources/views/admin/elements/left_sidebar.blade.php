<aside class="sidebar-wrapper">
    <div class="iconmenu">
        <div class="nav-toggle-box">
            <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
        </div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                <a href="{{route('dashboard')}}"><button class="nav-link"><i class="bi bi-house-door"></i></button></a>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Category">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-category" type="button">
                    <i class="bi bi-file-earmark"></i>
                </button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Brands">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-brands" type="button">
                    <i class="bi bi-bookmarks"></i>
                </button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Products">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-products" type="button">
                    <i class="bi bi-tags"></i>
                </button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Shipping">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-shipping" type="button">
                    <i class="bi bi-truck"></i>
                </button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Orders">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-orders" type="button">
                    <i class="bi bi-bag"></i>
                </button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Discount">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-discount" type="button">
                    <i class="bi bi-percent"></i>
                </button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Users">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-users" type="button">
                    <i class="bi bi-people"></i>
                </button>
            </li>
        </ul>
    </div>
    <div class="textmenu">
        <div class="brand-logo">
            <img src="{{asset('admin-asset')}}/images/brand-logo-2.png" width="140" alt=""/>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="pills-category">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Categories</h5>
                        </div>
                    </div>
                    <a href="{{route('category.create')}}" class="list-group-item"><i class="bi bi-plus-square"></i>Add Category</a>
                    <a href="{{route('category.index')}}" class="list-group-item"><i class="bi bi-card-list"></i>All Category</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-brands">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Brands</h5>
                        </div>
                    </div>
                    <a href="{{route('brand.create')}}" class="list-group-item"><i class="bi bi-plus-square"></i>Add Brand</a>
                    <a href="{{route('brand.index')}}" class="list-group-item"><i class="bi bi-card-list"></i>All Brand</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-products">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Products</h5>
                        </div>
                    </div>
                    <a href="app-emailbox.html" class="list-group-item"><i class="bi bi-envelope"></i>Email</a>
                    <a href="app-chat-box.html" class="list-group-item"><i class="bi bi-chat-left-text"></i>Chat Box</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-shipping">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Shipping</h5>
                        </div>
                    </div>
                    <a href="app-emailbox.html" class="list-group-item"><i class="bi bi-envelope"></i>Email</a>
                    <a href="app-chat-box.html" class="list-group-item"><i class="bi bi-chat-left-text"></i>Chat Box</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-orders">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Orders</h5>
                        </div>
                    </div>
                    <a href="app-emailbox.html" class="list-group-item"><i class="bi bi-envelope"></i>Email</a>
                    <a href="app-chat-box.html" class="list-group-item"><i class="bi bi-chat-left-text"></i>Chat Box</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-discount">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Discount</h5>
                        </div>
                    </div>
                    <a href="app-emailbox.html" class="list-group-item"><i class="bi bi-envelope"></i>Email</a>
                    <a href="app-chat-box.html" class="list-group-item"><i class="bi bi-chat-left-text"></i>Chat Box</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-users">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Users</h5>
                        </div>
                    </div>
                    <a href="app-emailbox.html" class="list-group-item"><i class="bi bi-envelope"></i>Email</a>
                    <a href="app-chat-box.html" class="list-group-item"><i class="bi bi-chat-left-text"></i>Chat Box</a>
                </div>
            </div>
        </div>
    </div>
</aside>
