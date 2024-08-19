@extends('account.admin.layouts.default')
@section('styles')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="{{url('admin_assets/vendor/css/builder/styles.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')

    <div>
        <div class="row">
            <div class="col-2 border-right p-3 fixed-layout" id="layoutColumn">
                <div id="layoutContent" class="pb-5">
                    <h6>Layout</h6>
                    <div class="component border p-2 mb-2" draggable="true" data-type="container">Container</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="div">Div</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="grid">Grid</div>

                    <h6>Components</h6>
                    <div class="component border p-2 mb-2" draggable="true" data-type="heading">Heading</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="paragraph">Paragraph</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="image">Image</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="button">Button</div>

                    <h6>Forms</h6>
                    <div class="component border p-2 mb-2" draggable="true" data-type="input">Input Field</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="textarea">Textarea</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="checkbox">Checkbox</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="radio">Radio Button</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="select">Select Dropdown</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="submit">Submit Button</div>

                    <h6>Media</h6>
                    <div class="component border p-2 mb-2" draggable="true" data-type="video">Video</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="audio">Audio</div>

                    <h6>Interactive</h6>
                    <div class="component border p-2 mb-2" draggable="true" data-type="carousel">Carousel</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="accordion">Accordion</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="tabs">Tabs</div>

                    <h6>Miscellaneous</h6>
                    <div class="component border p-2 mb-2" draggable="true" data-type="divider">Divider</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="icon">Icon</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="list">List</div>
                    <div class="component border p-2 mb-2" draggable="true" data-type="table">Table</div>
                </div>
            </div>

            <div class="col-8 p-3" id="pageBuilderColumn">
                <div id="tittleBar" class="d-flex" style="justify-content: space-between">
                    <button id="layoutToggleBtn" class="mb-3">
                        <i class="fa-solid fa-caret-left"></i> </button>
                    <h6>Page Builder</h6>
                    <button id="stylesToggleBtn" class="mb-3">
                        <i class="fa-solid fa-caret-right"></i> </button>
                </div>

                <div class="dropzone border p-3" id="dropzone" style="min-height: 80vh">
                    Drag and drop elements
                </div>
                <button id="clearBtn" class="btn btn-danger mt-3">Clear HTML</button>
                <button id="exportBtn" class="btn btn-primary mt-3">Export HTML</button>
                <textarea id="output" class="form-control mt-3 mb-5" rows="10" readonly></textarea>
            </div>

            <div class="col-2 border-left p-3 fixed-layout" id="stylesColumn">
                <div id="layoutContent" class="pb-5">
                    <h6>Change Styles</h6>

                    <div class="btn-group-vertical w-100">
                        <h6>Text styles</h6>
                        <div id="styleEditor" class="style-editor">

                            <div class="style-editor-item">
                                <i class="fas fa-text-height" title="Font Size" data-action="fontSize"></i>
                                <input type="number" id="fontSize" min="8" max="100" step="1"
                                    placeholder="Font Size (px)">
                            </div>

                            <div class="style-editor-item">
                                <i class="fas fa-palette" title="Color" data-action="color"></i>
                                <input type="color" id="color">
                            </div>

                            <div class="style-editor-item">
                                <i class="fas fa-align-left" title="Text Align Left" data-action="textAlign"
                                    data-value="left"></i>
                                <i class="fas fa-align-center" title="Text Align Center" data-action="textAlign"
                                    data-value="center"></i>
                                <i class="fas fa-align-right" title="Text Align Right" data-action="textAlign"
                                    data-value="right"></i>
                            </div>

                            <div class="style-editor-item">
                                <i class="fas fa-bold" title="Bold" data-action="fontWeight" data-value="bold"></i>
                                <i class="fas fa-italic" title="Italic" data-action="fontStyle"></i>

                                <i class="fas fa-strikethrough" title="Line-through" data-action="textDecoration"
                                    data-value="line-through"></i>
                                <i class="fas fa-underline" title="Underline" data-action="textDecoration"
                                    data-value="underline"></i>
                                <i class="fas fa-font" title="None" data-action="textDecoration" data-value="none"></i>
                            </div>

                        </div>

                    </div>

                    <div class="btn-group-vertical w-100">
                        <h6>Layout styles</h6>
                        <div id="layoutStyleEditor" class="style-editor">

                            <div>
                                <h6>Edit grid</h6>

                                <div class="d-flex">
                                    <!-- Column Count -->
                                    <div class="style-editor-item">
                                        <i class="fas fa-columns" title="Columns" data-action="columns"></i>
                                        <select id="columnCount">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>

                                    <!-- Row Count -->
                                    <div class="style-editor-item">
                                        <i class="fas fa-border-all" title="Rows" data-action="rows"></i>
                                        <select id="rowCount">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h6>Edit flexbox</h6>
                                <!-- Change flex layout -->
                                <div class="style-editor-item">
                                    <i class="fas fa-align-left" title="Justify Content Start"
                                        data-action="justifyContent" data-value="flex-start"></i>
                                    <i class="fas fa-align-center" title="Justify Content Center"
                                        data-action="justifyContent" data-value="center"></i>
                                    <i class="fas fa-align-right" title="Justify Content End"
                                        data-action="justifyContent" data-value="flex-end"></i>
                                    <i class="fas fa-ellipsis-h" title="Justify Content Space Between"
                                        data-action="justifyContent" data-value="space-between"></i>
                                    <i class="fas fa-ellipsis-v" title="Justify Content Space Around"
                                        data-action="justifyContent" data-value="space-around"></i>
                                    <i class="fas fa-arrows-alt" title="Justify Content Stretch"
                                        data-action="justifyContent" data-value="stretch"></i>
                                </div>

                                <div class="style-editor-item">
                                    <i class="fas fa-align-justify" title="Align Items Start" data-action="alignItems"
                                        data-value="flex-start"></i>
                                    <i class="fas fa-align-justify" title="Align Items Center" data-action="alignItems"
                                        data-value="center"></i>
                                    <i class="fas fa-align-justify" title="Align Items End" data-action="alignItems"
                                        data-value="flex-end"></i>
                                    <i class="fas fa-align-justify" title="Align Items Baseline"
                                        data-action="alignItems" data-value="baseline"></i>
                                    <i class="fas fa-align-justify" title="Align Items Stretch" data-action="alignItems"
                                        data-value="stretch"></i>
                                </div>

                                <!-- Flex Direction -->
                                <div class="style-editor-item">
                                    <i class="fas fa-arrow-right" title="Flex Direction Row" data-action="flexDirection"
                                        data-value="row"></i>
                                    <i class="fas fa-arrow-down" title="Flex Direction Column"
                                        data-action="flexDirection" data-value="column"></i>
                                    <i class="fas fa-arrow-left" title="Flex Direction Row-Reverse"
                                        data-action="flexDirection" data-value="row-reverse"></i>
                                    <i class="fas fa-arrow-up" title="Flex Direction Column-Reverse"
                                        data-action="flexDirection" data-value="column-reverse"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="text-left" id="footer">
        <div>
            <p id="info">Drag and drop elements to page builder</p>
        </div>
    </div>



@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.0/beautify-html.min.js"></script>
<script src="{{url('admin_assets/vendor/js/builder/script.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"> --}}
</script>

@endsection