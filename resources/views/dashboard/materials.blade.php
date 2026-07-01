@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid px-0">
        <div class="row no-gap g-0">
            <div class="col-md-3 col-lg-2 dashboard-sidebar">
                @include('dashboard.sidebar')
            </div>
            <div class="col-md-9 col-lg-10 dashboard-main">
                @include('dashboard.header')
                <div class="dashboard-content p-4 p-md-5">
                    <!-- Page Header -->
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
                        <div>
                            <h2 class="fw-800 mb-0">📂 Study Materials</h2>
                            <p style="color: #666; margin-top: 4px;">Upload and manage your study resources</p>
                        </div>
                        <button class="btn btn-brutal btn-brutal-primary" data-bs-toggle="modal" data-bs-target="#uploadMaterialModal" style="font-size: 0.85rem; padding: 8px 20px;">
                            <i class="bi bi-upload"></i> Upload Material
                        </button>
                    </div>

                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4" style="border: var(--border); border-radius: 0; font-weight: 600;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger mb-4" style="border: var(--border); border-radius: 0; font-weight: 600;">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Filters -->
                    <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 16px 20px; margin-bottom: 24px;">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <select class="form-control" id="filterSubject" style="border: var(--border); border-radius: 0; padding: 8px 12px;">
                                    <option value="all">All Subjects</option>
                                    <option value="mathematics">Mathematics</option>
                                    <option value="physics">Physics</option>
                                    <option value="chemistry">Chemistry</option>
                                    <option value="biology">Biology</option>
                                    <option value="english">English</option>
                                    <option value="history">History</option>
                                    <option value="computer_science">Computer Science</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="filterType" style="border: var(--border); border-radius: 0; padding: 8px 12px;">
                                    <option value="all">All Types</option>
                                    <option value="notes">Notes</option>
                                    <option value="assignment">Assignments</option>
                                    <option value="lecture">Lecture Slides</option>
                                    <option value="practice">Practice Questions</option>
                                    <option value="reference">Reference Material</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="searchMaterial" placeholder="Search materials..." style="border: var(--border); border-radius: 0; border-right: none; padding: 8px 12px;">
                                    <button class="btn btn-brutal btn-brutal-primary" style="border-radius: 0; padding: 8px 16px; font-size: 0.85rem;">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <span id="materialCount" style="font-weight: 700; font-size: 0.9rem; color: #666;">0 items</span>
                            </div>
                        </div>
                    </div>

                    <!-- Materials Grid -->
                    <div class="row g-4" id="materialsGrid">
                        @forelse($materials ?? [] as $material)
                            <div class="col-md-4 col-lg-3 material-item" 
                                 data-subject="{{ $material['subject'] ?? '' }}" 
                                 data-type="{{ $material['type'] ?? '' }}"
                                 data-title="{{ $material['title'] ?? '' }}">
                                <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 20px; text-align: center; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                                    <span style="font-size: 3rem; display: block;">{{ $material['icon'] ?? '📄' }}</span>
                                    <h5 style="font-weight: 800; margin: 8px 0; font-size: 1rem;">{{ $material['title'] ?? 'Untitled' }}</h5>
                                    <p style="color: #666; font-size: 0.85rem; margin: 4px 0;">{{ $material['description'] ?? '' }}</p>
                                    <div style="display: flex; justify-content: center; gap: 4px; flex-wrap: wrap; margin: 8px 0;">
                                        <span style="background: #eee; padding: 2px 8px; border: var(--border); font-size: 0.65rem; font-weight: 700; text-transform: uppercase;">
                                            {{ $material['subject'] ?? 'General' }}
                                        </span>
                                        <span style="background: var(--brown); color: white; padding: 2px 8px; border: var(--border); font-size: 0.65rem; font-weight: 700; text-transform: uppercase;">
                                            {{ $material['type'] ?? 'File' }}
                                        </span>
                                        @if($material['is_important'] ?? false)
                                            <span style="background: var(--pink); color: white; padding: 2px 8px; border: var(--border); font-size: 0.65rem; font-weight: 700;">
                                                ⭐ Important
                                            </span>
                                        @endif
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 12px; padding-top: 12px; border-top: 1px solid #eee;">
                                        <span style="font-size: 0.7rem; color: #888;">
                                            <i class="bi bi-clock"></i> {{ $material['uploaded'] ?? 'N/A' }}
                                        </span>
                                        <div class="d-flex gap-1">
                                            @if(isset($material['id']))
                                                <a href="{{ route('materials.download', $material['id']) }}" 
                                                   class="btn btn-brutal btn-brutal-outline" 
                                                   style="padding: 4px 10px; font-size: 0.7rem;">
                                                    <i class="bi bi-download"></i>
                                                </a>
                                                <button class="btn btn-brutal btn-brutal-outline" 
                                                        style="padding: 4px 10px; font-size: 0.7rem;"
                                                        onclick="confirmDelete({{ $material['id'] }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 60px 20px; text-align: center;">
                                    <span style="font-size: 4rem; display: block;">📂</span>
                                    <h4 style="font-weight: 800; margin: 16px 0;">No Materials Found</h4>
                                    <p style="color: #666;">Upload your first study material to get started!</p>
                                    <button class="btn btn-brutal btn-brutal-primary mt-3" data-bs-toggle="modal" data-bs-target="#uploadMaterialModal">
                                        <i class="bi bi-upload"></i> Upload Now
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========== UPLOAD MATERIAL MODAL ========== -->
<div class="modal fade" id="uploadMaterialModal" tabindex="-1" aria-labelledby="uploadMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: var(--border); border-radius: 0; background: #f5f0e8;">
            <div class="modal-header" style="border-bottom: var(--border); padding: 20px 24px;">
                <h5 class="modal-title fw-800" id="uploadMaterialModalLabel" style="font-size: 1.2rem;">
                    <i class="bi bi-upload"></i> Upload Study Material
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('materials.store') }}" enctype="multipart/form-data" id="uploadMaterialForm">
                @csrf
                <div class="modal-body" style="padding: 24px;">
                    <!-- File Upload -->
                    <div class="mb-3">
                        <label for="material_file" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Select File <span style="color: #dc3545;">*</span></label>
                        <div style="border: var(--border); padding: 30px 20px; text-align: center; background: white; cursor: pointer;" 
                             onclick="document.getElementById('material_file').click()">
                            <span style="font-size: 3rem; display: block;">📎</span>
                            <p style="font-weight: 600; margin: 8px 0;">Click to upload or drag and drop</p>
                            <p style="font-size: 0.8rem; color: #888;">Supported: PDF, DOC, DOCX, TXT, PPT, PPTX, JPG, PNG (Max: 10MB)</p>
                            <input type="file" class="form-control" id="material_file" name="material_file"
                                   style="border: var(--border); border-radius: 0; padding: 12px 16px; display: none;"
                                   accept=".pdf,.doc,.docx,.txt,.ppt,.pptx,.jpg,.png" required>
                        </div>
                        <div id="fileInfo" style="margin-top: 8px; display: none;">
                            <span style="font-weight: 600;">Selected: </span>
                            <span id="fileName"></span>
                            <span style="margin-left: 12px; font-weight: 600;">Size: </span>
                            <span id="fileSize"></span>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="material_title" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Title <span style="color: #dc3545;">*</span></label>
                            <input type="text" class="form-control" id="material_title" name="material_title"
                                   style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                   placeholder="e.g., Calculus Notes Chapter 5" required>
                        </div>
                        <div class="col-md-12">
                            <label for="material_description" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Description</label>
                            <textarea class="form-control" id="material_description" name="material_description"
                                      style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                      rows="2" placeholder="Brief description of the material"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="material_subject" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Subject <span style="color: #dc3545;">*</span></label>
                            <select class="form-control" id="material_subject" name="material_subject"
                                    style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                <option value="">Select Subject...</option>
                                <option value="mathematics">📐 Mathematics</option>
                                <option value="physics">⚛️ Physics</option>
                                <option value="chemistry">🧪 Chemistry</option>
                                <option value="biology">🧬 Biology</option>
                                <option value="english">📖 English</option>
                                <option value="history">📜 History</option>
                                <option value="computer_science">💻 Computer Science</option>
                                <option value="other">📝 Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="material_type" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Material Type <span style="color: #dc3545;">*</span></label>
                            <select class="form-control" id="material_type" name="material_type"
                                    style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                <option value="">Select Type...</option>
                                <option value="notes">📝 Notes</option>
                                <option value="assignment">📋 Assignment</option>
                                <option value="lecture">📊 Lecture Slides</option>
                                <option value="practice">📝 Practice Questions</option>
                                <option value="reference">📚 Reference Material</option>
                                <option value="other">📎 Other</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="material_tags" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Tags</label>
                            <input type="text" class="form-control" id="material_tags" name="material_tags"
                                   style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                   placeholder="e.g., calculus, integration, derivatives (comma separated)">
                        </div>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_important" name="is_important"
                                       style="border: var(--border); border-radius: 0;">
                                <label class="form-check-label" for="is_important" style="font-weight: 600;">
                                    ⭐ Mark as Important
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: var(--border); padding: 16px 24px;">
                    <button type="button" class="btn btn-brutal btn-brutal-outline" data-bs-dismiss="modal" style="font-size: 0.85rem;">
                        <i class="bi bi-x-circle"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-brutal btn-brutal-primary" style="font-size: 0.85rem;">
                        <i class="bi bi-cloud-upload"></i> Upload Material
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========== DELETE CONFIRMATION MODAL ========== -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border: var(--border); border-radius: 0; background: #f5f0e8;">
            <div class="modal-header" style="border-bottom: var(--border); padding: 16px 20px;">
                <h5 class="modal-title fw-800" id="deleteModalLabel" style="font-size: 1.1rem;">
                    <i class="bi bi-exclamation-triangle" style="color: #dc3545;"></i> Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px;">
                <p style="font-size: 1.05rem;">Are you sure you want to delete this material?</p>
                <p style="color: #666;">This action cannot be undone.</p>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-brutal" style="background: #dc3545; color: white; border: var(--border); width: 100%;">
                        <i class="bi bi-trash"></i> Yes, Delete Material
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .material-item .btn-brutal-outline {
        border: var(--border);
        background: white;
        color: var(--black);
        padding: 4px 10px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        transition: transform 0.1s, box-shadow 0.1s;
    }
    .material-item .btn-brutal-outline:hover {
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow);
    }
    .material-item > div:hover {
        transform: translate(-3px, -3px);
        box-shadow: var(--shadow-lg);
    }
    .form-control:focus {
        box-shadow: none;
        border-color: var(--black);
        background: white;
    }
    .form-check-input:checked {
        background-color: var(--black);
        border-color: var(--black);
    }
    .modal-content .btn-close {
        border: var(--border);
        border-radius: 0;
        padding: 8px 12px;
        background: white;
        opacity: 1;
    }
    .modal-content .btn-close:hover {
        background: var(--black);
        color: white;
    }
    .btn-brutal {
        font-family: inherit;
        font-weight: 800;
        font-size: 0.95rem;
        border: var(--border);
        box-shadow: var(--shadow);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 28px;
        border-radius: 0;
        transition: transform 0.1s, box-shadow 0.1s;
    }
    .btn-brutal:hover {
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow-lg);
    }
    .btn-brutal-primary {
        background: var(--black);
        color: var(--brown);
    }
    .btn-brutal-secondary {
        background: var(--brown);
        color: var(--black);
    }
    .btn-brutal-outline {
        background: white;
        color: var(--black);
    }
    [style*="cursor: pointer;"]:hover {
        background: #f0f0f0 !important;
    }
    .alert {
        border: var(--border);
        border-radius: 0;
    }
</style>

<script>
    // File upload handler
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('material_file');
        const fileInfo = document.getElementById('fileInfo');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');

        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    fileName.textContent = file.name;
                    fileSize.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                    fileInfo.style.display = 'block';
                }
            });
        }

        // Filter materials
        const filterSubject = document.getElementById('filterSubject');
        const filterType = document.getElementById('filterType');
        const searchInput = document.getElementById('searchMaterial');
        const materials = document.querySelectorAll('.material-item');
        const materialCount = document.getElementById('materialCount');

        function filterMaterials() {
            const subject = filterSubject ? filterSubject.value : 'all';
            const type = filterType ? filterType.value : 'all';
            const search = searchInput ? searchInput.value.toLowerCase() : '';
            let visibleCount = 0;

            materials.forEach(item => {
                const itemSubject = item.dataset.subject || '';
                const itemType = item.dataset.type || '';
                const itemTitle = item.dataset.title || '';
                
                let show = true;
                
                if (subject !== 'all' && itemSubject !== subject) {
                    show = false;
                }
                if (type !== 'all' && itemType !== type) {
                    show = false;
                }
                if (search && !itemTitle.toLowerCase().includes(search)) {
                    show = false;
                }
                
                item.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });

            if (materialCount) {
                materialCount.textContent = visibleCount + ' items';
            }
        }

        if (filterSubject) filterSubject.addEventListener('change', filterMaterials);
        if (filterType) filterType.addEventListener('change', filterMaterials);
        if (searchInput) searchInput.addEventListener('input', filterMaterials);

        // Initial count
        if (materialCount) {
            materialCount.textContent = materials.length + ' items';
        }
    });

    // Delete confirmation
    function confirmDelete(id) {
        const form = document.getElementById('deleteForm');
        if (form) {
            form.action = "/materials/" + id;
        }
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    // Drag and drop support
    const dropZone = document.querySelector('[onclick*="material_file"]');
    if (dropZone) {
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.background = '#e8e0d8';
        });
        
        dropZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.background = 'white';
        });
        
        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.background = 'white';
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                const fileInput = document.getElementById('material_file');
                fileInput.files = files;
                fileInput.dispatchEvent(new Event('change'));
            }
        });
    }

    // Reset form when modal is closed
    document.getElementById('uploadMaterialModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('uploadMaterialForm').reset();
        document.getElementById('fileInfo').style.display = 'none';
    });
</script>
@endsection