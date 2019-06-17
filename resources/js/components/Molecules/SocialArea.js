import React from 'react';
import SocialLink from '../Atoms/SocialLink';

const SocialArea = (props) => (
    <div>
        <SocialLink name="GitHub" url={props.profile.github.url}/>
        <SocialLink name="Twitter" url={props.profile.twitter.url}/>
        <SocialLink name="Qiita" url={props.profile.qiita.url}/>
        <SocialLink name="はてなブログ" url={props.profile.hatena.url}/>
    </div>
);

export default SocialArea;

