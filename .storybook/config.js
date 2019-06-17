import { configure } from '@storybook/react';

function loadStories() {
    require('../resources/js/stories/index.js');
    require('../resources/js/components/Atoms/story.js');
    require('../resources/js/components/Molecules/story.js');
}

configure(loadStories, module);
