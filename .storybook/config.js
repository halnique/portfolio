import { configure } from '@storybook/react';

const req = require.context('../resources/ts/stories', true, /\.tsx$/);

const loadStories = () => {
    req.keys().forEach(req);
};

configure(loadStories, module);
