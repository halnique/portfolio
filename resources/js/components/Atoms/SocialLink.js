import React from 'react';

const SocialLink = (props) => (
    <a href={props.url} className="card-link"
       target="_blank">{props.name}</a>
);

export default SocialLink;
