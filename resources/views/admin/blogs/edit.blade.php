<div class="modal fade bd-example-modal-lg-edit-{{$post->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header w-100">
                    <h5 class="modal-title" id="defaultModalLabel">Modifier ce post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row justify-content-end mx-4">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>

                <form action="{{route('admin.blog.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Titre<span style="color:red;">*</span></label>
                        <input type="text" name="titre" required
                            value="{{ old('titre') ? old('titre') : $post->titre }}"
                            class="form-control @error('titre') is-invalid @enderror">
                        @error('titre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Rédigez votre article</label>
                        <textarea required name="sujet" class="form-control @error('sujet') is-invalid @enderror"
                            id="editor" rows="10"
                            placeholder="Redigez votre article ici">{!! old('sujet') ? old('sujet') : $post->sujet !!}</textarea>
                        @error('sujet')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Image (optionelle)</label>
                        <input type="file" name="images" value="{{ old('images') ? old('images') : $post->images }}"
                            class="form-control @error('images') is-invalid @enderror">
                        @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
// editor
var editor = document.getElementById('editor');
if (editor) {
    var toolbarOptions = [
        [{
            'font': []
        }],
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{
                'header': 1
            },
            {
                'header': 2
            }
        ],
        [{
                'list': 'ordered'
            },
            {
                'list': 'bullet'
            }
        ],
        [{
                'script': 'sub'
            },
            {
                'script': 'super'
            }
        ],
        [{
                'indent': '-1'
            },
            {
                'indent': '+1'
            }
        ], // outdent/indent
        [{
            'direction': 'rtl'
        }], // text direction
        [{
                'color': []
            },
            {
                'background': []
            }
        ], // dropdown with defaults from theme
        [{
            'align': []
        }],
        ['clean'] // remove formatting button
    ];
    var quill = new Quill(editor, {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
}
</script>