document.addEventListener('DOMContentLoaded', () => {

    const addButton = document.getElementById('addQuestion');

    if (!addButton) return;

    const container = document.getElementById('questions');

    const template = document.getElementById('question-template');

    let questionCount = 0;

    // Add Question
    addButton.addEventListener('click', () => {

        questionCount++;

        const clone = template.content.cloneNode(true);

        clone.querySelector('.question-title').innerText =
            `Question #${questionCount}`;

        const index = questionCount - 1;

        clone.querySelectorAll('[data-name]').forEach(function (element) {

            element.name = element.dataset.name.replace('INDEX', index);

        });

        container.appendChild(clone);

    });

    // Change Question Type
    container.addEventListener('change', function (e) {

        if (!e.target.classList.contains('question-type')) {
            return;
        }

        const card = e.target.closest('.question-card');

        const optionsArea = card.querySelector('.options-area');

        const type = e.target.value;

        optionsArea.innerHTML = '';

        if (['radio', 'checkbox', 'dropdown'].includes(type)) {

            const questionName = card.querySelector('.question-input').name;

            const index = questionName.match(/\d+/)[0];

            optionsArea.innerHTML = getOptionsHtml(index);

        }

        if (type === 'rating') {

            optionsArea.innerHTML = `
                <div class="mt-3 fs-3">
                    ⭐ ⭐ ⭐ ⭐ ⭐
                </div>
            `;

        }

    });

    // Add Option
    container.addEventListener('click', function (e) {

        if (!e.target.classList.contains('add-option')) {
            return;
        }

        const list = e.target.parentElement;

        const count = list.querySelectorAll('input').length + 1;

        const div = document.createElement('div');

        div.className = 'input-group mb-2';

        const questionName = list.closest('.question-card')
            .querySelector('.question-input').name;

        const index = questionName.match(/\d+/)[0];

        div.innerHTML = `
        <input
        type="text"
        class="form-control option-input"
        placeholder="Option ${count}"
        name="questions[${index}][options][]">
        `;

        list.insertBefore(div, e.target);

    });

    // Remove Question
    container.addEventListener('click', function (e) {

        if (!e.target.classList.contains('remove-question')) {
            return;
        }

        e.target.closest('.question-card').remove();

        updateQuestionNumbers();

    });

    // Update Question Numbers
    function updateQuestionNumbers() {

        const cards = container.querySelectorAll('.question-card');

        questionCount = cards.length;

        cards.forEach((card, index) => {

            card.querySelector('.question-title').innerText =
                `Question #${index + 1}`;

        });

    }

});

function getOptionsHtml(index) {

    return `
        <div class="option-list mt-3">

            <div class="input-group mb-2">

                <input
                    type="text"
                    class="form-control option-input"
                    placeholder="Option 1"
                    name="questions[${index}][options][]">

            </div>

            <div class="input-group mb-2">

                <input
                    type="text"
                    class="form-control option-input"
                    placeholder="Option 2"
                    name="questions[${index}][options][]">

            </div>

            <button
                type="button"
                class="btn btn-outline-primary btn-sm add-option">

                + Add Option

            </button>

        </div>
    `;
}