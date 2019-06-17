import { configure } from '@storybook/react';

function loadStories() {
    require('../resources/js/components/Atoms/story.js');
    require('../resources/js/components/Molecules/story.js');
    require('../resources/js/components/Organisms/story.js');
    require('../resources/js/components/Templates/story.js');
}

configure(loadStories, module);
