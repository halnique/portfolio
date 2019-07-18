import React from 'react';
import { Tag as TypeTag } from 'index';

interface Props {
    name: TypeTag.Name,
}

const Tag = (props: Props) => (
    <span className="mr-2 badge badge-secondary">#{props.name}</span>
);

export default Tag;
