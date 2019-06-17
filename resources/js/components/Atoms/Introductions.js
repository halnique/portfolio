import React from 'react';
import Linkify from 'react-linkify';

const Introductions = (props) => (
    <p className="card-text"
       style={{ whiteSpace: 'pre-line' }}>
        <Linkify>{props.introductions}</Linkify>
    </p>
);

export default Introductions;
