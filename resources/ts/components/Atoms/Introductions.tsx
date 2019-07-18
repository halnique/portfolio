import React from 'react';
import Linkify from 'react-linkify';
import { Profile } from "index";

type Props = {
    introductions: Profile.Introductions,
}

const Introductions = (props: Props) => (
    <p className="card-text"
       style={{ whiteSpace: 'pre-line' }}>
        <Linkify>{props.introductions}</Linkify>
    </p>
);

export default Introductions;
