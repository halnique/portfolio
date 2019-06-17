import React from 'react';
import Tag from '../Atoms/Tag';

const TagArea = (props) => (
    <div className="card-text">
        {props.tags.map(tag => {
            return (
                <Tag key={tag.id} name={tag.name}/>
            );
        })}
    </div>
);

export default TagArea;

