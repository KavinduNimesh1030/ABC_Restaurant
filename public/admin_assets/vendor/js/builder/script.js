document.addEventListener("DOMContentLoaded", () => {
    // alert("ssss");
    const components = document.querySelectorAll(".component");
    const dropzone = document.getElementById("dropzone");
    const exportBtn = document.getElementById("exportBtn");
    const output = document.getElementById("output");
    const clearBtn = document.getElementById("clearBtn");
    const info = document.getElementById("info");
    const layoutToggleBtn = document.getElementById("layoutToggleBtn");
    const layoutColumn = document.getElementById("layoutColumn");
    const stylesToggleBtn = document.getElementById("stylesToggleBtn");
    const stylesColumn = document.getElementById("stylesColumn");
    const pageBuilderColumn = document.getElementById("pageBuilderColumn");
    let selectedElement = null;

    // toggle buttons left and right sidebars
    $("#layoutToggleBtn").on("click", function () {
        const icon = $(this).find("i");
        icon.toggleClass("fa-caret-left fa-caret-right");
    });
    $("#stylesToggleBtn").on("click", function () {
        const icon = $(this).find("i");
        icon.toggleClass("fa-caret-right fa-caret-left");
    });

    pageBuilderColumn.classList.toggle("expanded");

    layoutToggleBtn.addEventListener("click", () => {
        layoutColumn.classList.toggle("hidden");
    });

    stylesToggleBtn.addEventListener("click", () => {
        stylesColumn.classList.toggle("hidden");
    });

    // clear button
    clearBtn.addEventListener("click", () => {
        dropzone.innerHTML = "";
        info.innerHTML = "Drag and drop elements to page builder";
        dropzone.innerHTML = "Drag and drop elements";
    });

    // drag and drop
    components.forEach((component) => {
        component.addEventListener("dragstart", dragStart);
    });

    dropzone.addEventListener("dragover", dragOver);
    dropzone.addEventListener("drop", drop);

    function dragStart(e) {
        e.dataTransfer.setData("type", e.target.dataset.type);
    }

    function dragOver(e) {
        e.preventDefault();
        const target = e.target.closest(".dropzone");
        if (target) {
            target.classList.add("drag-over");
        }
    }

    dropzone.addEventListener("dragleave", (e) => {
        const target = e.target.closest(".drag-over");
        if (target) {
            target.classList.remove("drag-over");
        }
    });

    // Drop prebuilt element
    function drop(e) {
        e.preventDefault();
        const type = e.dataTransfer.getData("type");
        const dropTarget = e.target.closest(".dropzone");

        if (dropzone.innerHTML.trim() === "Drag and drop elements") {
            dropzone.innerHTML = "";
        }

        const element = document.createElement("div");
        element.classList.add("element", "customBorder");

        switch (type) {
            case "container":
                element.classList.add("container");
                element.innerHTML =
                    '<div class="container dropzone pbContainer" style="min-height: 50px;"></div>';
                break;
            case "div":
                element.classList.add("div");
                element.innerHTML =
                    '<div class="d-flex dropzone pbDiv" style="min-height: 50px;"></div>';
                break;
            case "grid":
                element.classList.add("grid");
                element.innerHTML = `
                <div class="dropzone row grid-container pbGrid" style="min-height: 100px;">
                    <div class="dropzone grid-item"></div>
                </div>`;
                break;
            case "image":
                element.innerHTML =
                    '<img src="https://via.placeholder.com/150" class="img-fluid pbImage" alt="Image">';
                break;
            case "button":
                element.innerHTML =
                    '<button class="btn btn-primary pbButton">Click Me</button>';
                break;
            case "heading":
                element.innerHTML =
                    '<h3 contenteditable="true" class="pbHeading">Editable Heading</h3>';
                break;
            case "paragraph":
                element.innerHTML =
                    '<p contenteditable="true" class="pbParagraph">Editable paragraph text</p>';
                break;
        }

        addDeleteButton(element);

        element.addEventListener("click", selectElement);

        dropTarget.appendChild(element);
        dropTarget.classList.remove("drag-over");
    }

    // create delete button for every element
    function addDeleteButton(element) {
        const deleteIcon = document.createElement("span");
        deleteIcon.classList.add("delete-icon");
        deleteIcon.innerHTML = "&times;";
        deleteIcon.addEventListener("click", (e) => {
            e.stopPropagation(); // Prevent triggering parent click event
            element.remove();
            const parentElement = element.parentElement;
            if (parentElement && parentElement !== dropzone) {
                updateDeleteButton(parentElement);
            }
        });
        element.appendChild(deleteIcon);
    }

    function updateDeleteButton(parentElement) {
        // Check if parent element has child dropzones
        const childDropzones = parentElement.querySelectorAll(".dropzone");
        // If no child dropzones or they are all empty, add a delete button to the parent
        if ([...childDropzones].every((dz) => !dz.children.length)) {
            if (!parentElement.querySelector(".delete-icon")) {
                addDeleteButton(parentElement);
            }
        }
    }

    // select element
    function selectElement(e) {
        e.stopPropagation(); // Prevent triggering parent click event
        if (selectedElement) {
            selectedElement.classList.remove("selected");
        }
        selectedElement = e.currentTarget;
        selectedElement.classList.add("selected");

        let elementType = "";

        // Determine the type based on the class of descendants
        if (selectedElement.querySelector(".pbContainer")) {
            elementType = "Container";
        } else if (selectedElement.querySelector(".pbDiv")) {
            elementType = "Div";
        } else if (selectedElement.querySelector(".pbGrid")) {
            elementType = "Grid";
        } else if (selectedElement.querySelector(".pbImage")) {
            elementType = "Image";
        } else if (selectedElement.querySelector(".pbButton")) {
            elementType = "Button";
        } else if (selectedElement.querySelector(".pbHeading")) {
            elementType = "Heading";
        } else if (selectedElement.querySelector(".pbParagraph")) {
            elementType = "Paragraph";
        } else {
            elementType = "Unknown Element";
        }

        // Display the selected element's type
        info.innerHTML = `Selected Element: <strong>${elementType}</strong>`;
    }

    // Event listener to reset info when clicking outside of elements and styleEditor
    document.addEventListener("click", function (e) {
        // Check if the clicked element is outside the selectable elements and styleEditor
        if (
            !e.target.closest(".element") &&
            !e.target.closest("#layoutContent")
        ) {
            // Deselect the currently selected element
            if (selectedElement) {
                selectedElement.classList.remove("selected");
                selectedElement = null;
            }
            // Display default message
            info.innerHTML = "Drag and drop elements to page builder";
        }
    });

    /*     // Add click event listener to all elements with pbHeading class
        document.querySelectorAll('.pbHeading').forEach(heading => {
            heading.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent triggering parent click event
                selectElement({ currentTarget: heading });
            });
        }); */

    // heading and paragraph styles editor
    const fontSizeInput = $("#fontSize");
    const colorInput = $("#color");
    const textAlignButtons = $('.style-editor-item [data-action="textAlign"]');
    const fontWeightButton = $('.style-editor-item [data-action="fontWeight"]');
    const fontStyleButton = $('.style-editor-item [data-action="fontStyle"]');
    const textDecorationButtons = $(
        '.style-editor-item [data-action="textDecoration"]'
    );

    let isBold = false;
    let isItalic = false;

    // Handle font size change
    fontSizeInput.on("input", function () {
        const fontSize = $(this).val();
        if (fontSize && selectedElement) {
            $(selectedElement)
                .find(".pbHeading, .pbParagraph")
                .css("font-size", `${fontSize}px`);
        }
    });

    // Handle color change
    colorInput.on("input", function () {
        const color = $(this).val();
        if (color && selectedElement) {
            $(selectedElement)
                .find(".pbHeading, .pbParagraph")
                .css("color", color);
        }
    });

    // Handle text alignment
    textAlignButtons.on("click", function () {
        const textAlign = $(this).data("value");
        if (selectedElement) {
            $(selectedElement)
                .find(".pbHeading, .pbParagraph")
                .css("text-align", textAlign);
        }
    });

    // Handle font weight toggle
    fontWeightButton.on("click", function () {
        isBold = !isBold; // Toggle the state
        const fontWeight = isBold ? "bold" : "normal";
        $(this).toggleClass("active", isBold); // Toggle class for active state

        if (selectedElement) {
            $(selectedElement)
                .find(".pbHeading, .pbParagraph")
                .css("font-weight", fontWeight);
        }
    });

    // Handle font style toggle (Italic)
    fontStyleButton.on("click", function () {
        isItalic = !isItalic; // Toggle the state
        const fontStyle = isItalic ? "italic" : "normal";
        $(this).toggleClass("active", isItalic); // Toggle class for active state

        if (selectedElement) {
            $(selectedElement)
                .find(".pbHeading, .pbParagraph")
                .css("font-style", fontStyle);
        }
    });

    // Handle text decoration (Line-through, Underline, None)
    textDecorationButtons.on("click", function () {
        const textDecoration = $(this).data("value");
        if (selectedElement) {
            $(selectedElement)
                .find(".pbHeading, .pbParagraph")
                .css("text-decoration", textDecoration);
        }

        // Toggle active state for decorations
        textDecorationButtons.removeClass("active");
        $(this).addClass("active");
    });

    /////////////////////
    const columnCountSelect = document.getElementById("columnCount");
    const rowCountSelect = document.getElementById("rowCount");

    function updateGrid() {
        let columnCount = parseInt(columnCountSelect.value);
        let rowCount = parseInt(rowCountSelect.value);

        if (
            columnCount &&
            rowCount &&
            selectedElement &&
            selectedElement.querySelector(".pbGrid")
        ) {
            const gridContainer = selectedElement.querySelector(".pbGrid");
            gridContainer.innerHTML = ""; // Clear existing grid items

            for (let row = 0; row < rowCount; row++) {
                for (let col = 0; col < columnCount; col++) {
                    const gridItem = document.createElement("div");
                    gridItem.className = `dropzone col-12 col-sm-${
                        12 / columnCount
                    } grid-item`;
                    gridContainer.appendChild(gridItem);
                }
            }
        }
    }

    // Add change event listeners to the column and row count selects
    columnCountSelect.addEventListener("change", updateGrid);
    rowCountSelect.addEventListener("change", updateGrid);

    //////////////////////////////
    const styleEditor = document.getElementById("layoutStyleEditor");

    // Event listener for style editor buttons
    styleEditor.addEventListener("click", function (e) {
        if (e.target.tagName === "I") {
            const action = e.target.getAttribute("data-action");
            const value = e.target.getAttribute("data-value");
            applyFlexStyle(action, value);
        }
    });

    function applyFlexStyle(action, value) {
        if (!selectedElement) return;

        const flexContainer = selectedElement.querySelector(".pbDiv");
        if (flexContainer) {
            switch (action) {
                case "alignContent":
                    flexContainer.style.alignContent = value;
                    break;
                case "justifyContent":
                    flexContainer.style.justifyContent = value;
                    break;
                case "alignItems":
                    flexContainer.style.alignItems = value;
                    break;
                case "flexDirection":
                    flexContainer.style.flexDirection = value;
                    break;
                default:
                    break;
            }
        }
    }

    //////////////////////////////

    // Export html
    exportBtn.addEventListener("click", exportHTML);

    function exportHTML() {
        const clonedDropzone = dropzone.cloneNode(true);
        const deleteIcons = clonedDropzone.querySelectorAll(".delete-icon");
        deleteIcons.forEach((icon) => icon.remove());

        const selectedElements = clonedDropzone.querySelectorAll(".selected");
        selectedElements.forEach((element) =>
            element.classList.remove("selected")
        );

        const rawHTML = clonedDropzone.innerHTML;

        // Beautify the HTML
        const beautifiedHTML = html_beautify(rawHTML, {
            indent_size: 2,
            wrap_line_length: 80,
            preserve_newlines: true,
            max_preserve_newlines: 1,
            indent_inner_html: true,
        });

        output.value = beautifiedHTML;
    }
});
