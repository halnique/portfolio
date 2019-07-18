import React from 'react';
import { Tag as TagData } from "index";
import Tag from '../Atoms/Tag';

type Props = {
    tags: Array<TagData>,
}

const TagArea = (props: Props) => (
    <div className="card-text">
        {props.tags.map(tag => {
            return (
                <Tag key={tag.id} name={tag.name}/>
            );
        })}
    </div>
);

export default TagArea;
