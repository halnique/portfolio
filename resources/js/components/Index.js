import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Index extends Component {
    constructor(props) {
        super(props);
        this.state = {
            profiles: [],
        };
    }

    componentDidMount() {
        axios.get('/api/profiles').then((response) => {
            this.setState({
                profiles: response.data,
            });
        }).catch(error => {
            console.log(error);
        });
    }

    render() {
        const profiles = this.state.profiles.map(profile => {
            const styleIntroductions = {
                whiteSpace: 'pre-line',
            };
            return (
                <div key={profile.id} className="card-group">
                    <div className="card">
                        <div className="card-header">{profile.name}</div>
                        <img src={profile.iconUrl}
                             alt="Icon"
                             className="card-img-top"/>
                    </div>
                    <div className="card">
                        <div className="card-body">
                            <p className="card-text" style={styleIntroductions}>{profile.introductions}</p>
                            <a href={profile.github.url} className="card-link"
                               target="_blank">GitHub</a>
                            <a href={profile.twitter.url} className="card-link"
                               target="_blank">Twitter</a>
                            <a href={profile.qiita.url} className="card-link"
                               target="_blank">Qiita</a>
                            <a href={profile.hatena.url} className="card-link"
                               target="_blank">はてなブログ</a>
                            <div className="card-text">
                                {profile.tags.map(tag => {
                                    return (
                                        <span key={tag.id} className="mr-2 badge badge-secondary">#{tag.name}</span>
                                    );
                                })}
                            </div>
                        </div>
                    </div>
                </div>
            );
        });
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-10">
                        {profiles}
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index/>, document.getElementById('index'));
}
