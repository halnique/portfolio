import React from 'react';
import Introductions from '../Atoms/Introductions';
import SocialArea from '../Molecules/SocialArea';
import TagArea from '../Molecules/TagArea';

const BodyCard = (props) => (
    <div className="card">
        <div className="card-body">
            <Introductions introductions={props.profile.introductions}/>
            <SocialArea profile={props.profile}/>
            <TagArea tags={props.profile.tags}/>
        </div>
    </div>
);

export default BodyCard;

