--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: amount; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE amount (
    amountid integer NOT NULL,
    dateinvested date NOT NULL,
    amountinvested double precision NOT NULL,
    datewithdrew date NOT NULL,
    amountwithdrew double precision NOT NULL,
    amountinterested double precision NOT NULL,
    investmentid integer NOT NULL,
    loginid integer
);


ALTER TABLE amount OWNER TO postgres;

--
-- Name: amount_amountid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE amount_amountid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE amount_amountid_seq OWNER TO postgres;

--
-- Name: amount_amountid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE amount_amountid_seq OWNED BY amount.amountid;


--
-- Name: investment; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE investment (
    investmentid integer NOT NULL,
    name character varying(40) NOT NULL,
    apr real NOT NULL
);


ALTER TABLE investment OWNER TO postgres;

--
-- Name: investment_investmentid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE investment_investmentid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE investment_investmentid_seq OWNER TO postgres;

--
-- Name: investment_investmentid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE investment_investmentid_seq OWNED BY investment.investmentid;


--
-- Name: login; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE login (
    loginid integer NOT NULL,
    username character varying(40) NOT NULL,
    password character varying(50) NOT NULL,
    email character varying(150)
);


ALTER TABLE login OWNER TO postgres;

--
-- Name: login_loginid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE login_loginid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE login_loginid_seq OWNER TO postgres;

--
-- Name: login_loginid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE login_loginid_seq OWNED BY login.loginid;


--
-- Name: amount amountid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY amount ALTER COLUMN amountid SET DEFAULT nextval('amount_amountid_seq'::regclass);


--
-- Name: investment investmentid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY investment ALTER COLUMN investmentid SET DEFAULT nextval('investment_investmentid_seq'::regclass);


--
-- Name: login loginid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY login ALTER COLUMN loginid SET DEFAULT nextval('login_loginid_seq'::regclass);


--
-- Data for Name: amount; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY amount (amountid, dateinvested, amountinvested, datewithdrew, amountwithdrew, amountinterested, investmentid, loginid) FROM stdin;
1	2016-05-10	1000	2017-05-10	1200	200	1	\N
2	2016-05-10	1000	2017-05-10	1200	200	1	1
3	2016-05-10	2000	2017-05-10	2400	400	1	2
4	2016-05-10	2000	2017-05-10	2400	400	2	1
5	2016-05-10	4000	2017-05-10	4800	800	2	2
6	2016-05-10	1000	2017-05-10	1200	200	3	1
\.


--
-- Name: amount_amountid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('amount_amountid_seq', 6, true);


--
-- Data for Name: investment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY investment (investmentid, name, apr) FROM stdin;
1	LFT	11.25
2	NTN	10.5
3	CDB	9.5
4	LFT	11.25
5	NTN	10.5
\.


--
-- Name: investment_investmentid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('investment_investmentid_seq', 5, true);


--
-- Data for Name: login; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY login (loginid, username, password, email) FROM stdin;
1	jeff	1234	jeff@jeff.com
2	dyuli	4321	dyuli@dyuli.com
\.


--
-- Name: login_loginid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('login_loginid_seq', 2, true);


--
-- Name: amount amount_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY amount
    ADD CONSTRAINT amount_pkey PRIMARY KEY (amountid);


--
-- Name: investment investment_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY investment
    ADD CONSTRAINT investment_pkey PRIMARY KEY (investmentid);


--
-- Name: login login_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY login
    ADD CONSTRAINT login_pkey PRIMARY KEY (loginid);


--
-- Name: amount amount_investmentid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY amount
    ADD CONSTRAINT amount_investmentid_fkey FOREIGN KEY (investmentid) REFERENCES investment(investmentid);


--
-- PostgreSQL database dump complete
--

